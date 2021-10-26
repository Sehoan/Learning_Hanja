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
}
