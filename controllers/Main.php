<?php
/*
 * Author(s): Sehoan Choi (sc8zt)
 */

class Main {

    public function __construct() {
        $this->db = new Database();
    }
    
    public function run($parts) {
        $page = $parts[0];
        
        switch($page) {
            case "account":
                $this->account($parts[1]);
                break;
            case "search":
                $this->search($parts[1]);
                break;
            case "quiz":
                $this->quiz($parts[1]);
                break;
            default:
                if (isset($_SESSION["username"])) {
                  $this->search("form");
                } else {
                  $this->account("login");
                }
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
}

