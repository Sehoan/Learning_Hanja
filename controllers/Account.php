<?php
/*
 * Author(s): Sehoan Choi (sc8zt), Ryu Patterson (rjp5cc)
 */

class Account {

  private $db;
  private $base_url;

  public function __construct() {
    $this->db = new Database();
    $this->config = new Config();
    $this->base_url = $this->config->getURL();
  }

  public function run($action) {

    switch($action) {
    case "login":
      $this->login();
      break;
    case "logout":
      $this->logout();
      break;
    case "recent_search":
      $this->recentSearch();
      break;
    case "wordbook":
      $this->wordbook();
      break;
    default:
      $this->login();
    }

  }

  public function login() {
    $error_msg = "";
    if (isset($_POST["username"])) { // check if any username is in post object
      $data = $this->db->query("select * from user where username = ?;", "s", $_POST["username"]);
      if ($data === false) { // query failed
        $error_msg = "Error checking for user";
      } else if (!empty($data)) {
        // query succeeded and an existing user's found, validate password
        if (password_verify($_POST["password"], $data[0]["password"])) {
          $_SESSION["username"] = $data[0]["username"];
          $_SESSION["user_id"] = $data[0]["id"];
          header("Location: {$this->base_url}/search/search_form");
          return;
        } else {
          $error_msg = "Invalid Password";
        }
      } else {
        // query succeeded but no user's found, sign up a new user
        $password = $_POST['password'];
        if( ! preg_match( '/^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$/', $password)){
          $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
          $insert = $this->db->query("insert into user (username, password) values (?, ?);", "ss", $_POST["username"], $hash);
          if ($insert === false) {
            $error_msg = "Error creating new user";
          }

          // create session obejcts to maintain user's state in the site
          $_SESSION["username"] = $_POST["username"];
          $id = $this->db->query("select max(id) from user");
          $id = $id[0]["max(id)"];
          $_SESSION["user_id"] = $id;
          header("Location: {$this->base_url}/search/search_form");
          return;
        } else{

          $error_msg = "Your password must have at least one upper and lowercase letter, one number, and one special character ";
        }
      }
    }

    include "views/login.php";
  }

  private function logout() {
    session_start(); // join existing session
    session_destroy(); // destroy existing session
    header("Location: {$this->base_url}/"); // redirect to home page
  }

  public function recentSearch() {
    include ('views/recent_search.php');
  }

  public function wordbook() {
    $error_msg = "";
    // handle get request with its queries
    if (isset($_GET["command"]) && $_GET["command"] == "delete") {
      // delete a character from the user's wordbook
      $delete = $this->db->query("delete from favorites where
        user_id={$_SESSION["user_id"]} and kanji_id={$_GET["kanji_id"]};");
      if ($delete == false) {
        $error_msg = "Failed to delete the character";
      }
    }
    // retrieve a list of letters in the user's wordbook
    $userWordbook = $this->db->query(
      "select * from favorites
      inner join kanji on kanji_id=id
      where user_id={$_SESSION["user_id"]};");

    if (isset($_GET["command"]) && $_GET["command"] == "export") {
      // export the user's wordbook in json
      foreach ($userWordbook as $k => $row) {
        unset($row["user_id"]);
        unset($row["kanji_id"]);
        unset($row["user_id"]);
        $userWordbook[$k] = $row;
        echo "\n";
      }
      $jsonReport = json_encode($userWordbook);
      header('Content-Type: application/json; charset=utf-8');
      echo $jsonReport;
      return;
    }
    include("views/wordbook.php");
  }
}
