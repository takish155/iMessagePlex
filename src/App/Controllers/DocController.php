<?php

namespace App\Controllers;


class DocController extends HomeController
{
  function __construct($locale)
  {
    parent::__construct($locale);
  }

  public function index()
  {
    loadView("pages/docs/index", [
      "t" => $this->translation->loadMessage("doc-page")["docs"],
      "locale" => $this->locale
    ]);
  }
}
