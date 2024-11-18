<?php

namespace App\Controllers;

use Framework\Database;
use App\Controllers\LocaleController;

class HomeController
{
  protected $db;
  protected $translation;
  protected $locale;

  public function __construct($locale)
  {
    $config = require basePath("config/db.php");
    $this->db = new Database($config);

    $translation = new LocaleController($locale);
    $this->translation = $translation;

    $this->locale = $locale;
  }

  public function index()
  {
    $t = $this->translation->loadMessage("home-page");

    loadView("/pages/index", [
      "t" => $t,
      "locale" => $this->locale
    ]);
  }
};
