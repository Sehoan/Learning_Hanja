<?php

class Database {

  private $mysqli;

  public function __construct() {
    include('./database_connection.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $this->mysqli = new mysqli($dbserver, $dbuser, $dbpass, $dbdatabase);
  }

  public function query($query, $types = null, ...$params) {
    $stmt = $this->mysqli->prepare($query);

    if ($types != null)
      $stmt->bind_param($types, ...$params);

    if (!$stmt->execute()) {
      // execute failed
      return false;
    }

    // execute succeeded
    if (($res = $stmt->get_result()) !== false) 
      return $res->fetch_all(MYSQLI_ASSOC);

    return true;
  }
}
