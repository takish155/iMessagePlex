<?php

namespace App\Controllers;

class LocaleController
{
  private $locale;

  public function __construct($locale)
  {
    $this->locale = $locale;
  }

  public function loadMessage($name)
  {
    $message = require basePath("../public_html/messages/$this->locale/$name.php");

    if (!$message) {
      return "Message of $name not found in locale of $this->locale!";
    }

    return $message;
  }
};
