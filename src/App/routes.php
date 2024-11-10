<?php


// return [
//   "/" => "controllers/home.php",
//   "/listings" => "controllers/listings/index.php",
//   "/listings/create" => "controllers/listings/create.php",
//   "404" => "controllers/error/404.php"
// ];



$router->get("/", "HomeController@index");

$router->get("/auth/sign-in", "AuthController@signIn", ["guest"]);
$router->get("/auth/sign-up", "AuthController@signUp", ["guest"]);

$router->post("/auth/sign-in", "AuthController@handleSignIn", ["guest", "AuthValidation@signIn"]);
$router->post("/auth/sign-up", "AuthController@handleSignUp", ["guest", "AuthValidation@signUp"]);
$router->delete("/auth/sign-out", "AuthController@handleSignOut", ["auth"]);

$router->get("/dashboard", "UserController@index", ["auth"]);
$router->post("/user/generate-api-key", "UserController@generateApiKey");
$router->post("/user/message/{username}", "UserController@sendMessage");