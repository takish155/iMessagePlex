<?php

namespace App\Validations;

use Framework\Validation;

class AuthValidation extends LocaleValidation
{
  function __construct($locale)
  {
    parent::__construct($locale);
  }

  /**
   * Handles validation for sign in
   *
   * @return void
   */
  public function signIn($params = [])
  {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $translation = $this->translation->loadMessage("sign-in-page");
    $t = $translation["server"];

    $errors = [];

    if (!Validation::string($username, 3, 30)) {
      $errors[] = ["username" => $t["usernameError"]];
    }

    if (!Validation::string($password, 6, 100)) {
      $errors[] = ["password" => $t["passwordError"]];
    }

    if (!empty($errors)) {
      return loadView("pages/auth/sign-in", [
        "errors" => $errors,
        "username" => $username,
        "password" => $password,
        "t" => $translation["view"],
        "locale" => $this->locale,
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

    $translation = $this->translation->loadMessage("sign-up-page");
    $t = $translation["server"];

    $errors = [];

    if (!Validation::string($username, 3, 30)) {
      $errors[] = ["username" => $t["usernameError"]];
    }

    if (!Validation::email($email) || !Validation::string($email, 5, 100)) {
      $errors[] = ["email" => $t["emailError"]];
    }

    if (!Validation::string($password, 6, 100)) {
      $errors[] = ["password" => $t["passwordError"]];
    }

    if (!Validation::match($password, $confirmPassword)) {
      $errors[] = ["confirmPassword" => $t["confirmPasswordError"]];
    }
    // TODO: Load views translation of sign up page
    if (!empty($errors)) {
      loadView("pages/auth/sign-up", [
        "errors" => $errors,
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "confirmPassword" => $confirmPassword,
        "t" => $translation["view"],
        "locale" => $this->locale,
      ]);

      exit;
    };
  }
};
