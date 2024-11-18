<?php

namespace App\Controllers;

use Framework\Session;

class UserController extends HomeController
{
  private $t;

  function __construct($locale)
  {
    parent::__construct($locale);

    $this->t = $this->translation->loadMessage("dashboard-page");
  }

  public function index()
  {

    $userId = Session::get("user")["id"];
    $messageCount = $this->db->query("SELECT COUNT(*) AS total_count FROM messages WHERE userId = :userId", [
      "userId" => $userId,
    ])->fetch();

    $messageTodayCount = $this->db->query("SELECT COUNT(*) AS message_count FROM messages WHERE DATE(created_at) = CURDATE() AND userId = :userId", [
      "userId" => $userId,
    ])->fetch();

    $messages = $this->db->query("SELECT * FROM messages WHERE userId = :userId ORDER BY id DESC", [
      "userId" => $userId
    ])->fetchAll();

    loadView(
      "pages/dashboard/index",
      [
        "messageCount" => $messageCount->total_count,
        "messageTodayCount" => $messageTodayCount->message_count,
        "messages" => $messages,
        "t" => $this->t["view"],
        "locale" => $this->locale
      ]
    );
  }

  public function generateApiKey()
  {
    $t = $this->t["server"];

    $randomBytes = random_bytes(32);
    $apiKey = bin2hex($randomBytes);
    $userId = Session::get("user")["id"];

    $hashedApiKey = password_hash($apiKey, PASSWORD_DEFAULT);

    $this->db->query("UPDATE user SET apiKey = :apiKey WHERE id = :userId", [
      "userId" => $userId,
      "apiKey" => $hashedApiKey
    ]);



    Session::setFlashMessage("success_message", $t["generatedApiKey"] . $apiKey);

    redirect("/$this->locale/dashboard");
    exit;
  }

  public function sendMessage($params)
  {
    $t = $this->t["server"];

    $username = htmlspecialchars($params["username"] ?? "");
    $jsonBody = file_get_contents('php://input');
    $data = json_decode($jsonBody, true);

    $apiKey = htmlspecialchars($data["apiKey"] ?? "");
    $email = htmlspecialchars($data["email"] ?? "");
    $name = htmlspecialchars($data["name"] ?? "");
    $message = htmlspecialchars($data["message"] ?? "");

    $user = $this->db->query("SELECT * FROM user WHERE username = :username", [
      "username" => $username
    ])->fetch();

    if (!$user) {
      sendJsonResponse([
        "message" => $t["invalidCredentials"],
      ], 400);
      exit;
    }

    if (!password_verify($apiKey, $user->apiKey)) {
      sendJsonResponse([
        "message" => $t["invalidCredentials"],
      ], 400);
      exit;
    }

    $this->db->query("INSERT INTO messages(name, email, message, userId) VALUES (:name, :email, :message, :userId)", [
      "name" => $name,
      "email" => $email,
      "message" => $message,
      "userId" => $user->id
    ]);

    sendJsonResponse([
      "message" => $t["successfullySentMessage"],
    ], 200);
    exit;
  }

  public function deleteMessage($params)
  {
    $t = $this->t["server"];

    $this->db->query("DELETE FROM messages WHERE id = :id", [
      "id" => $params["id"]
    ])->fetch();

    Session::setFlashMessage("success_message", $t["successfullyDeletedMessage"]);

    return redirect("/$this->locale/dashboard");
  }
}
