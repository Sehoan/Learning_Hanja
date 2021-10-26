<?php
class Search {

  private $db;

  private $base_url;

  public function __construct() {
    $this->db = new Database();
    $this->config = new Config();
    $this->base_url = $this->config->getURL();
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
    $error_msg = "";
    if (isset($_POST["user_id"]) && isset($_POST["kanji_id"])) {
      $insert = $this->db->query("insert into favorites (user_id, kanji_id) values (?,?);",
        "ii", $_POST["user_id"], $_POST["kanji_id"]);

      if ($insert == false) {
        $error_msg = "Failed to add a character to your wordbook";
      }
    }
    $result = $this->db->query("select kanji_id from favorites where user_id={$_SESSION["user_id"]};");
    $addedLetters = array();
    foreach($result as $row) {
      array_push($addedLetters, $row["kanji_id"]);
    }
    $keyword = $_POST["keyword"];
    $result = $this->db->query(
      "select *, k.id as kanji_id from hanja h inner join kanji k 
      on h.literal=k.literal and sound=?;", "s", $keyword);
    include "views/search_result.php";
  }
}
