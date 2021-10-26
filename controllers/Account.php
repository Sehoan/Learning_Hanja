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
        $_SESSION["user_id"] = $_POST["user_id"];
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
    if (isset($_POST["user_id"]) && isset($_POST["kanji_id"])) {
      echo $_POST["user_id"];
      echo $_POST["kanji_id"];
    }
    include("views/wordbook.php");
  }




  public function question() {
    // Our php code from question.php last time!

    $data = $this->db->query("select id, question from question order by rand() limit 1;");
    if (!isset($data[0])) {
      die("No questions in the database");
    }
    $question = $data[0];

    $message = "";

    if (isset($_POST["questionid"])) {
      $qid = $_POST["questionid"];
      $answer = $_POST["answer"];

      $data = $this->db->query("select * from question where id = ?;", "i", $qid);
      if ($data === false) {
        // did not work
        $message = "<div class='alert alert-info'>Error: could not find previous question</div>";
      } else if (!isset($data[0])) {
        // worked
        $message = "<div class='alert alert-info'>Error: could not find previous question</div>";
      } else {
        // found question
        if ($data[0]["answer"] == $answer) {
          // user answered correctly -- perhaps we should also be better about how we
          // verify their answers, perhaps use strtolower() to compare lower case only.
          $message = "<div class='alert alert-success'><b>$answer</b> was correct!</div>";

          // Update the score in the session object
          $_SESSION["score"] += $data[0]["points"];
          // Update the score in the database using the SQL UPDATE query
          $this->db->query("update user set score  = ? where email = ?;", "is", $_SESSION["score"], $_SESSION["email"]);
        } else { 
          $message = "<div class='alert alert-danger'><b>$answer</b> was incorrect! The answer was: {$data[0]['answer']}</div>";
        }
      }
    }

    // set user information for the page
    $user = [
      "name" => $_SESSION["name"],
      "email" => $_SESSION["email"],
      "score" => $_SESSION["score"]
    ];

    include("templates/question.php");
  }
}
