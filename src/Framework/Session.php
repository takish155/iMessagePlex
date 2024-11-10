<?php

namespace Framework;

class Session
{
  /**
   * Start the session
   * 
   * @return void
   */

  public static function start()
  {
    if (session_start() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  /**
   * Set a session key/value pair
   * 
   * @param string $key
   * @param mixed $value
   * @return void
   */
  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  /**
   * Get a session value by key
   * 
   * @param string $key
   * @param mixed $default
   * @return mixed
   */
  public static function get($key, $default = null)
  {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
  }

  /**
   * Check if session key exist
   * 
   * @param string $key
   * @return bool
   * 
   */
  public static function has($key)
  {
    return isset($_SESSION[$key]);
  }

  /**
   * Clear session by key
   * 
   * @param string $key
   * @return void
   */
  public static function clear($key)
  {
    if (Session::has($key)) {
      unset($_SESSION[$key]);
    }
  }

  /**
   * Clear all session data
   * 
   * @return void
   */
  public static function clearAll()
  {
    session_unset();
    session_destroy();
  }

  /**
   * Authenticate the user
   * 
   * @param string $userId
   * @param string $username
   * @param string $email
   * @return void
   */
  public static function authenticate($userId, $username, $email)
  {
    Session::set("user", [
      "id" => $userId,
      "username" => $username,
      "email" => $email,
    ]);

    redirect("/");
    return;
  }

  /**
   * Set a flash message
   * 
   * @param string $key
   * @param string $message
   * @return void
   */
  public static function setFlashMessage($key, $message)
  {
    self::set("flash_$key", $message);
  }

  /**
   * Get a flash message
   * 
   * @param string $key
   * @param mixed $default
   * @return string
   */
  public static function getFlashMessage($key, $default = null)
  {
    $message = self::get("flash_$key", $default);
    self::clear("flash_$key");

    return $message;
  }

  public static function isAuthenticated()
  {
    return self::has("user");
  }
}
