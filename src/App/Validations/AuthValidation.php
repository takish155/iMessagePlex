<?php

namespace App\Validations;

use Framework\Validation;

class AuthValidation
{
  /**
   * Handles validation for sign in
   *
   * @return void
   */
  public function signIn($params = [])
  {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $errors = [];

    if (!Validation::string($username, 3, 30)) {
      $errors[] = ["username" => "Username must be around 3-30 characters"];
    }

    if (!Validation::string($password, 6, 100)) {
      $errors[] = ["password" => "Password must be around 6-100 characters"];
    }

    if (!empty($errors)) {
      return loadView("pages/auth/sign-in", [
        "errors" => $errors,
        "username" => $username,
        "password" => $password,
      ]);
    };
  }

  /**
   * Handles validation for sign up
   *
   * @return void
   */
  public function signUp($params = [])
  {
    $username = htmlspecialchars($_POST["username"] ?? "");
    $email = htmlspecialchars($_POST["email"] ?? "");
    $password = htmlspecialchars($_POST["password"] ?? "");
    $confirmPassword = htmlspecialchars($_POST["confirm-password"] ?? "");

    $errors = [];

    if (!Validation::string($username, 3, 30)) {
      $errors[] = ["username" => "Username must be around 3-30 characters"];
    }

    if (!Validation::email($email) || !Validation::string($email, 5, 100)) {
      $errors[] = ["email" => "Must be a valid email or be around 5-100 characters"];
    }

    if (!Validation::string($password, 6, 100)) {
      $errors[] = ["password" => "Password must be around 6-100 characters"];
    }

    if (!Validation::match($password, $confirmPassword)) {
      $errors[] = ["confirmPassword" => "Password doesn't match!"];
    }

    if (!empty($errors)) {
      loadView("pages/auth/sign-up", [
        "errors" => $errors,
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "confirmPassword" => $confirmPassword,
      ]);

      exit;
    };
  }
};
