<?php

$router->get("/{locale}", "HomeController@index");

$router->get("/{locale}/auth/sign-in", "AuthController@signIn", ["guest"]);
$router->get("/{locale}/auth/sign-up", "AuthController@signUp", ["guest"]);

$router->post("/{locale}/auth/sign-in", "AuthController@handleSignIn", ["guest", "AuthValidation@signIn"]);
$router->post("/{locale}/auth/sign-up", "AuthController@handleSignUp", ["guest", "AuthValidation@signUp"]);
$router->delete("/{locale}/auth/sign-out", "AuthController@handleSignOut", ["auth"]);

$router->get("/{locale}/dashboard", "UserController@index", ["auth"]);
$router->post("/{locale}/user/generate-api-key", "UserController@generateApiKey");
$router->post("/{locale}/user/message/{username}", "UserController@sendMessage", ["UserValidation@sendMessage"]);

$router->delete("/{locale}/user/message/{id}", "UserController@deleteMessage", ["auth", "UserValidation@deleteMessage"]);

$router->get("/{locale}/docs", "DocController@index");
