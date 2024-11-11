<?php

namespace App\Validations;

use Framework\Validation;

class UserValidation
{
  /**
   * Handles message validation
   */
  public function sendMessage()
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
};
