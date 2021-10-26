<?php

class Search {

  private $db;

  private $base_url = "/hanja_interpreter";

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
    $keyword = $_POST["keyword"];
    $result = $this->db->query(
      "select *, k.id as kanji_id from hanja h inner join kanji k 
        on h.literal=k.literal and sound=?", "s", $keyword);
    include "views/search_result.php";
  }
}
