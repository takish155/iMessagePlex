<?php

namespace App\Controllers;

use Framework\Session;

class UserController extends HomeController
{
  function __construct()
  {
    parent::__construct();
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

    $messages = $this->db->query("SELECT * FROM messages WHERE userId = :userId ORDER BY id DESC LIMIT 10", [
      "userId" => $userId
    ])->fetchAll();




    loadView(
      "pages/dashboard/index",
      [
        "messageCount" => $messageCount->total_count,
        "messageTodayCount" => $messageTodayCount->message_count,
        "messages" => $messages
      ]
    );
  }

  public function generateApiKey()
  {
    $randomBytes = random_bytes(32);
    $apiKey = bin2hex($randomBytes);
    $userId = Session::get("user")["id"];

    $hashedApiKey = password_hash($apiKey, PASSWORD_DEFAULT);

    $this->db->query("UPDATE user SET apiKey = :apiKey WHERE id = :userId", [
      "userId" => $userId,
      "apiKey" => $hashedApiKey
    ]);

    Session::setFlashMessage("success_message", "Successfully generated API key of '$apiKey'.");

    redirect("/dashboard");
    exit;
  }

  public function sendMessage($params)
  {
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
        "message" => "User not found!",
      ], 404);
      exit;
    }

    if (!password_verify($apiKey, $user->apiKey)) {
      sendJsonResponse([
        "message" => "Invalid credentials!",
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
      "message" => "Successfully sent message!",
    ], 200);
    exit;
  }
}
