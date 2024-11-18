<?php

namespace App\Validations;

use Framework\Database;
use Framework\Session;
use Framework\Validation;

class UserValidation extends LocaleValidation
{
  private $db;

  function __construct($locale)
  {
    $config = require basePath("config/db.php");
    $this->db = new Database($config);

    parent::__construct($locale);
  }

  /**
   * Handles message validation
   */
  public function sendMessage($params = [])
  {
    $jsonBody = file_get_contents('php://input');
    $data = json_decode($jsonBody, true);

    $apiKey = htmlspecialchars($data["apiKey"] ?? "");
    $name = htmlspecialchars($data["name"] ?? "");
    $email = htmlspecialchars($data["email"] ?? "");
    $message = htmlspecialchars($data["message"] ?? "");

    $errors = [];

    if (!Validation::string($apiKey)) {
      $errors["apiKey"] = ["message" => "Please provide an API key!"];
    }

    if (!Validation::string($name, 3, 100)) {
      $errors["name"] = ["message" => "Please provide a name between 3-100 characters!"];
    }

    if (!Validation::string($email, 3, 100) || !Validation::email($email)) {
      $errors["email"] = ["message" => "Please provide a correct email and between 3-100 characters!"];
    }

    if (!Validation::string($message, 3, 3000)) {
      $errors["email"] = ["message" => "Please provide a message between 3-3000 characters!"];
    }

    if (!empty($errors)) {
      sendJsonResponse([
        "message" => "Validation failed!",
        "errors" => $errors
      ], 400);
      exit;
    }
  }

  public function deleteMessage($params = [])
  {


    $user = $this->db->query("SELECT * FROM messages WHERE id = :id", [
      "id" => $params["id"]
    ])->fetch();

    if (!$user) {
      Session::setFlashMessage("error_message", "Message doesn't exist. Probably it got removed?");
      return redirect("/dashboard");
    }


    if ($user->userId !== Session::get("user")["id"]) {
      Session::setFlashMessage("error_message", "You don't own this message!");
      return redirect("/dashboard");
    }
  }
};
