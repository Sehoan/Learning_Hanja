<?php

class Main {

    public function __construct() {
        $this->db = new Database();
    }
    
    public function run($parts) {
        $page = $parts[0];
        $action = $parts[1];
        
        switch($page) {
            case "account":
                $this->account($action);
                break;
            case "search":
                $this->search($action);
                break;
            default:
                $this->quiz($action);
                break;
        }
            
    }

    public function account($action) {
        $account = new Account();
        $account->run($action);
    }
    public function search($action) {
        $search = new Search();
        $search->run($action);
    }
    public function quiz($action) {
        $quiz = new Quiz();
        $quiz->run($action);

    }
    
    private function destroySession() {          
        session_destroy();

        session_start();
    }
    
    
    public function login() {
        // our login code from index.php last time!
        $error_msg = "";
        if (isset($_POST["email"])) { /// validate the email coming in
            $data = $this->db->query("select * from user where email = ?;", "s", $_POST["email"]);
            if ($data === false) {
                $error_msg = "Error cheking for user";
            } else if (!empty($data)) { 
                // user was found!
                // validate the user's password
                if (password_verify($_POST["password"], $data[0]["password"])) {
                    $_SESSION["name"] = $data[0]["name"];
                    $_SESSION["email"] = $data[0]["email"];
                    $_SESSION["score"] = $data[0]["score"];
                    header("Location: {$this->url}/question/");
                    return;
                } else {
                    $error_msg = "Invalid Password";
                }
            } else {
                $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $insert = $this->db->query("insert into user (name, email, password) values (?, ?, ?);", "sss", $_POST["name"], $_POST["email"], $hash);
                if ($insert === false) {
                    $error_msg = "Error creating new user";
                } 
                
                $_SESSION["name"] = $_POST["name"];
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["score"] = 0;
                header("Location: {$this->url}/question/");
                return;
            }

        }

        include "templates/login.php";
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

