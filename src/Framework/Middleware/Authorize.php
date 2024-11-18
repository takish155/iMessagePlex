<?php

namespace Framework\Middleware;

use Framework\Session;

class Authorize
{
  private $locale;

  public function __construct($locale)
  {
    $this->locale = $locale;
  }

  /**
   * Check if user is authenticated
   * 
   * @return boolean
   */
  public function isAuthenticated()
  {
    return Session::has("user");
  }


  /**
   * Handle user's request
   * 
   * @param string $role
   * @return bool 
   */
  public function handle($role)
  {
    $locale = $this->locale;

    if ($role === "guest" && $this->isAuthenticated()) {
      return redirect("/$locale/dashboard");
    }
    if ($role === "auth" && !$this->isAuthenticated()) {
      return redirect("/$locale/auth/sign-in");
    }
  }
}
