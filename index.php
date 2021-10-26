<?php
/*
 * Author(s): Sehoan Choi (sc8zt)
 * url: https://cs4640.cs.virginia.edu/sc8zt/learning_hanja/
 */

spl_autoload_register(function($classname) {
  include "controllers/$classname.php";
});

// Join session or start one
session_start();

// general config option for setting base_url
$config = new Config();
$base_url = $config->getURL();
// Parse the URL
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = str_replace($base_url."/", "", $path);
$parts = explode("/", $path);

// path has a form "/account/login", "search/search_form", "quiz/quiz_form"
// parts[0] => determines which controller (account, search, quiz)
// parts[1] => determines which action/page

// if username is not set, user hasn't logged in yet, take him to the login page
if (!isset($_SESSION["username"])) {
  $parts[0] = "account";
  $parts[1] = "login";
}

// pass the parsed url to main controller
$main = new Main();
$main->run($parts);
