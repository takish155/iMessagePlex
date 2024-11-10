<?php

namespace App\Controllers;

use Framework\Session;
use Framework\Validation;

class AuthController extends HomeController
{
  function __construct()
  {
    parent::__construct();
  }

  /**
   * Loads the sign-in page
   *
   * @return void
   */
  public function signIn()
  {

    return loadView("pages/auth/sign-in");
  }

  /**
   * Loads the sign-up page
   *
   * @return void
   */
  public function signUp()
  {

    return loadView("pages/auth/sign-up");
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

    $user = $this->db->query("SELECT * FROM user WHERE username = :username", ["username" => $username])->fetch();
    if (!$user) {
      return loadView("pages/auth/sign-in", [
        "errors" => ["credentials" => "Invalid credentials, either username or password is incorrect!"],
        "username" => $username,
        "password" => $password,
      ]);
    }

    if (!password_verify($password, $user->password)) {
      return loadView("pages/auth/sign-in", [
        "errors" => ["credentials" => "Invalid credentials, either username or password is incorrect!"],
        "username" => $username,
        "password" => $password,
      ]);;
    }

    Session::authenticate($user->id, $user->username, $user->email);

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

    $usernameExist = $this->db->query("SELECT * FROM user WHERE username = :username", ["username" => $username])->fetch();
    if ($usernameExist) {
      return loadView("pages/auth/sign-up", [
        "errors" => ["server" => "Username already exist. Please try another one!"],
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "confirmPassword" => $confirmPassword,
      ]);
    };

    $emailExist = $this->db->query("SELECT * FROM user WHERE email = :email", ["email" => $email])->fetch();
    if ($emailExist) {
      return loadView("pages/auth/sign-up", [
        "errors" => ["server" => "Email already exist. Please try another one!"],
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "confirmPassword" => $confirmPassword,
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

    Session::authenticate($userId, $username, $email);

    return redirect("/dashbboard");
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
