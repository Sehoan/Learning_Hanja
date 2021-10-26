<?php

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
                $this->account("login");
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
}
