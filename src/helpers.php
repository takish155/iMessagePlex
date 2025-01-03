<?php

use App\Controllers\LocaleController;

/**
 * Get the base path 
 * 
 * @param string $path
 * @return string
 */

function basePath($path = "")
{
  return __DIR__ . "/" . $path;
}

/**
 * Load the view
 * 
 * @param string $name
 * @param array $props = []
 * @return void
 */

function loadView($name, $props = [])
{
  $path = basePath("App/views/$name.view.php");

  if (file_exists($path)) {
    // Makes the props available in the view
    extract($props);
    require $path;
  } else {
    echo "Path of $name doesn't exist!";
  }
}

/**
 * Load the partials
 * 
 * @param string $partialName
 * @return void
 */

function loadPartials($partialName, $props = [])
{
  $path = basePath("App/views/partials/$partialName.php");

  if (file_exists($path)) {
    extract($props);
    require $path;
  } else {
    echo "Path of $partialName doesn't exist!";
  }
}

/**
 * Inspect the value
 * 
 * @param mixed $value
 * @return void
 */

function inspect($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
};

/**
 * Inspect the value and die
 * 
 * @param mixed $value
 * @return void
 */

function inspectAndDie($value)
{
  echo "<pre>";
  die(var_dump($value));
  echo "</pre>";
};

/**
 * Formats money into 1,000,000
 * 
 * @param string $money
 * @return string
 */

function formatMoney($money)
{
  return "￥" . number_format(floatval($money));
}

/**
 * Sanitizes the data
 * @param string $dirty
 * @return string
 * 
 */

function sanitize($dirty)
{
  return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}

/**
 * Redirects to give url
 * @param string $url
 * @return void
 */

function redirect($url)
{
  header("Location: $url");
  exit;
}

/**
 * Creates a response of JSON
 * 
 * @param mixed $data
 * @param int $statusCode = 200
 * 
 * @return void
 */
function sendJsonResponse($data, $statusCode = 200)
{
  // Set the HTTP response status code first
  http_response_code($statusCode);

  // Then set the content type to JSON
  header('Content-Type: application/json');

  // Finally, output the JSON-encoded data
  echo json_encode($data);
}




/**
 * Get the users current locale
 */
function getLocale()
{

  $url = $_SERVER['REQUEST_URI']; // Get the current URL path
  if (preg_match('/^\/ja/', $url)) {
    return "ja";
  }
  return "en"; // Default locale
}



/**
 * Get message
 *
 * @param string $pageName
 * @return void
 */
function getMessage($pageName)
{
  $locale = getLocale();

  $translation = new LocaleController($locale);

  return $translation->loadMessage($pageName);
};
