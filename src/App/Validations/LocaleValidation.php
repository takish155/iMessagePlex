<?php

namespace App\Validations;

use App\Controllers\LocaleController;

class LocaleValidation
{
  protected $translation;
  protected $locale;

  public function __construct($locale)
  {
    $this->translation = new LocaleController($locale);
    $this->locale = $locale;
  }
}
