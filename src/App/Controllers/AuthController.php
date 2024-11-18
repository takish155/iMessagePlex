<?php

namespace App\Controllers;

use Framework\Session;

class AuthController extends HomeController
{
  function __construct($locale)
  {
    parent::__construct($locale);
  }

  /**
   * Loads the sign-in page
   *
   * @return void
   */
  public function signIn()
  {

    $t = $this->translation->loadMessage("sign-in-page");
    return loadView("pages/auth/sign-in", [
      "t" => $t["view"],
      "locale" => $this->locale
    ]);
  }

  /**
   * Loads the sign-up page
   *
   * @return void
   */
  public function signUp()
  {
    $t = $this->translation->loadMessage("sign-up-page");

    return loadView("pages/auth/sign-up", [
      "t" => $t["view"],
      "locale" => $this->locale
    ]);
  }

  /**
   * Handle sign in
   * 
   * @return void
   */
  public function handleSignIn()
  {
    $username = htmlspecialchars($_POST["username"] ?? "");
    $password = htmlspecialchars($_POST["password"] ?? "");

    $translation = $this->translation->loadMessage("sign-in-page");
    $t = $translation["server"];

    $user = $this->db->query("SELECT * FROM user WHERE username = :username", ["username" => $username])->fetch();
    if (!$user) {
      return loadView("pages/auth/sign-in", [
        "errors" => ["credentials" => $t["invalidCredentials"]],
        "username" => $username,
        "password" => $password,
        "t" => $translation["view"],
        "locale" => $this->locale,
      ]);
    }

    if (!password_verify($password, $user->password)) {
      return loadView("pages/auth/sign-in", [
        "errors" => ["credentials" => $t["invalidCredentials"]],
        "username" => $username,
        "password" => $password,
        "t" => $translation["view"],
        "locale" => $this->locale,
      ]);
    }

    Session::authenticate($user->id, $user->username, $user->email, $this->locale);

    return redirect("/dashboard");
  }

  /**
   * Handle sign up
   * 
   * @return void
   */
  public function handleSignUp()
  {
    $username = htmlspecialchars($_POST["username"] ?? "");
    $email = htmlspecialchars($_POST["email"] ?? "");
    $password = htmlspecialchars($_POST["password" ?? ""]);
    $confirmPassword = htmlspecialchars($_POST["confirm-password"] ?? "");

    $translation = $this->translation->loadMessage("sign-up-page");
    $t = $translation["server"];


    $usernameExist = $this->db->query("SELECT * FROM user WHERE username = :username", ["username" => $username])->fetch();
    if ($usernameExist) {
      return loadView("pages/auth/sign-up", [
        "errors" => ["server" => $t["usernameExist"]],
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "confirmPassword" => $confirmPassword,
        "t" => $translation["view"],
        "locale" => $this->locale,
      ]);
    };

    $emailExist = $this->db->query("SELECT * FROM user WHERE email = :email", ["email" => $email])->fetch();
    if ($emailExist) {
      return loadView("pages/auth/sign-up", [
        "errors" => ["server" => $t["emailExist"]],
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "confirmPassword" => $confirmPassword,
        "t" => $translation["view"],
        "locale" => $this->locale,
      ]);
    };

    $this->db->query("
    INSERT into user(username, email, password)
    VALUES (:username, :email, :password);
    ", [
      "username" => $username,
      "email" => $email,
      "password" => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $userId = $this->db->conn->lastInsertId();

    Session::authenticate($userId, $username, $email, $this->locale);

    return redirect("/$this->locale/dashbboard");
  }

  /**
   * Handle sign-out
   * @return void
   */
  public function handleSignOut()
  {
    Session::clearAll();
    return redirect("/auth/sign-in");
  }
}
