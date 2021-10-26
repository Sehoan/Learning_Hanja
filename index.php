<?php

spl_autoload_register(function($classname) {
  include "controllers/$classname.php";
});


define('ROOT_PATH', dirname(__DIR__) . '/hanja_interpreter/');
// Join session or start one
session_start();

// Parse the URL
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$path = str_replace("/hanja_interpreter/", "", $path);
$parts = explode("/", $path);

// path has a form "/account/login", "search/search_form", "quiz/quiz_form"
// parts[0] => determines which controller (account, search, quiz)
// parts[1] => determines which action/page


// If the user's email is not set in the session, then it's not
// a valid session (they didn't get here from the login page),
// so we should send them over to log in first before doing
// anything else!
if (!isset($_SESSION["username"])) {
  $parts[0] = "account";
  $parts[1] = "login";
}

if (isset($_GET["page"])) {
  $parts[0] = $_GET["page"];
  $parts[1] = $_GET["action"];
}
$main = new Main();
$main->run($parts);
