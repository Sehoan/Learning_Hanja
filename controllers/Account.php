<?php

class Account {

  private $db;
  private $base_url = "/hanja_interpreter";

  public function __construct() {
    $this->db = new Database();
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
    if (isset($_POST["username"])) { /// validate the email coming in
      $data = $this->db->query("select * from user where username = ?;", "s", $_POST["username"]);
      if ($data === false) { // error occurred while querying
        $error_msg = "Error cheking for user";
      } else if (!empty($data)) { 
        // validate the user's password
        if (password_verify($_POST["password"], $data[0]["password"])) {
          $_SESSION["username"] = $data[0]["username"];
          $_SESSION["user_id"] = $data[0]["id"];
          header("Location: {$this->base_url}/search/search_form");
          return;
        } else {
          $error_msg = "Invalid Password";
        }
      } else {
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $insert = $this->db->query("insert into user (username, password) values (?, ?);", "ss", $_POST["username"], $hash);
        if ($insert === false) {
          $error_msg = "Error creating new user";
        } 

        $_SESSION["username"] = $_POST["username"];
        $id = $this->db->query("select max(id) from user");
        $id = $id[0]["max(id)"];
        $_SESSION["user_id"] = $id;
        header("Location: {$this->base_url}/search/search_form");
        return;
      }
    }

    include "views/login.php";
  }

  private function logout() {          
    session_destroy();
    header("Location: /hanja_interpreter/");
  }

  public function recentSearch() {

  }
  public function wordbook() {
    $error_msg = "";
    if (isset($_GET["command"]) && $_GET["command"] == "delete") {
      $delete = $this->db->query("delete from favorites where
        user_id={$_SESSION["user_id"]} and kanji_id={$_GET["kanji_id"]};");
      if ($delete == false) {
        $error_msg = "Failed to delete the character";
      }
    }
    $userWordbook = $this->db->query(
      "select * from favorites 
      inner join kanji on kanji_id=id 
      where user_id={$_SESSION["user_id"]};");
    include("views/wordbook.php");
  }
}
