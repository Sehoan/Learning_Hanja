<?php

class Search {

    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function run($action) {
        switch($action) {
            case "search_form":
                $this->searchForm();
                break;
            case "search_result":
                $this->searchResult();
                break;
            default:
                $this->searchForm();
                break;
        }
            
    }
    
    public function searchForm() {
        include "views/search_form.php";
    }

    public function searchResult() {
        include "views/search_result.php";
    }
}
