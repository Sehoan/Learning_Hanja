<?php
/*
 * Author(s): Sehoan Choi (sc8zt), Ryu Patterson (rjp5cc)
 */

class Search {

  private $db;

  private $base_url;

  public function __construct() {
    $this->db = new Database();
    $this->config = new Config();
    $this->base_url = $this->config->getURL();
  }

  public function run($action) {
    // run appropriate functions based on the action passed in
    switch($action) {
      case "search_form":
        $this->searchForm();
        break;
      case "search_result_ltd":
        $this->searchResultLtd();
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
    // handle adding a letter to wordbook
    if (isset($_POST["user_id"]) && isset($_POST["kanji_id"])) {
      $insert = $this->db->query("insert into favorites (user_id, kanji_id) values (?,?);",
        "ii", $_POST["user_id"], $_POST["kanji_id"]);

      if ($insert == false) { // insert query failed
        $error_msg = "Failed to add a character to your wordbook";
      }
    }

    // retrieve letters already present in the user's wordbook
    $result = $this->db->query("select kanji_id from favorites where user_id={$_SESSION["user_id"]};");
    $addedLetters = array();
    foreach($result as $row) {
      array_push($addedLetters, $row["kanji_id"]);
    }
    // use search keyword to query search results
    $keyword = $_POST["keyword"];

    if(array_key_exists('recent',$_COOKIE)){
      $cookie = $_COOKIE['recent'];
      $cookie = unserialize($cookie);
    } else{
      $cookie = array();
    }

    // counts number of items in recent search history
    $x = 0;
    foreach($cookie as $search){
      $x++;
    }
    // checks to see if recently was searched to avoid duplicates
    if(count($cookie) <= 1){
      $cookie[] = $keyword;
      $cookie = serialize($cookie);
      setcookie('recent',$cookie,time()+3600,'/');
    } else if(count($cookie) > 1 && $cookie[$x-1] != $keyword){
      $cookie[] = $keyword;
      $cookie = serialize($cookie);
      setcookie('recent',$cookie,time()+3600,'/');
    }

    $result = $this->db->query(
      "select *, k.id as kanji_id from hanja h inner join kanji k
      on h.literal=k.literal and (sound like ?) UNION select *, k.id as kanji_id from hanja h inner join kanji k
      on h.literal=k.literal and (on_yomi like ?) UNION select *, k.id as kanji_id from hanja h inner join kanji k
      on h.literal=k.literal and (k.literal like ?);", "sss", $keyword,$keyword,$keyword);

    include "views/search_result.php";
  }

  // same as the search function but does not add to recent searches
  public function searchResultLtd() {
    $error_msg = "";
    // handle adding a letter to wordbook
    if (isset($_POST["user_id"]) && isset($_POST["kanji_id"])) {
      $insert = $this->db->query("insert into favorites (user_id, kanji_id) values (?,?);",
        "ii", $_POST["user_id"], $_POST["kanji_id"]);

      if ($insert == false) { // insert query failed
        $error_msg = "Failed to add a character to your wordbook";
      }
    }

    // retrieve letters already present in the user's wordbook
    $result = $this->db->query("select kanji_id from favorites where user_id={$_SESSION["user_id"]};");
    $addedLetters = array();
    foreach($result as $row) {
      array_push($addedLetters, $row["kanji_id"]);
    }
    // use search keyword to query search results
    $keyword = $_POST["keyword"];

    $result = $this->db->query( // joins result of on_yomi, korean sound, as well as the literal.
      "select *, k.id as kanji_id from hanja h inner join kanji k
      on h.literal=k.literal and (sound like ?) UNION select *, k.id as kanji_id from hanja h inner join kanji k
      on h.literal=k.literal and (on_yomi like ?) UNION select *, k.id as kanji_id from hanja h inner join kanji k
      on h.literal=k.literal and (k.literal like ?);", "sss", $keyword,$keyword,$keyword);

    include "views/search_result.php";
  }
}
