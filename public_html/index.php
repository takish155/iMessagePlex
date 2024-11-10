<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require __DIR__ . "/../src/vendor/autoload.php";

use Framework\Router;
use Framework\Session;

// Init session
Session::start();

require "../src/helpers.php";


// Auto loader (Loads all file in Framework if exist)
// spl_autoload_register(function ($class) {
//   $path = basePath("Framework/$class.php");
//   if (file_exists($path)) {
//     require $path;
//   }
// });


// Init Router
$router = new Router();

// Get Routes
require basePath("App/routes.php");

// Get URI and HTTP Method
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Route the request
$router->route($uri);
