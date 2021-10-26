<?php
    include('./database_connection.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = new mysqli($dbserver, $dbuser, $dbpass, $dbdatabase);

    /*
     *$db->query("drop table if exists question;");
     *$db->query("create table question (
     *    id int not null auto_increment,
     *    category text not null,
     *    question text not null,
     *    answer text not null,
     *    points int not null,
     *    primary key (id));");
     */

    $db->query("drop table if exists user;");
    $db->query("create table user (
        id int not null auto_increment,
        username text not null,
        password text not null,
        primary key (id));");


    $db->query("drop table if exists kanji;");
    $db->query("create table kanji(
      id int not null auto_increment,
      literal text not null,
      on_yomi text not null,
      kun_yomi text not null,
      meaning text not null,
      stroke_count int not null,
      primary key (id)
    );");

    $db->query("drop table if exists hanja");
    $db->query("create table hanja(
      id int not null auto_increment,
      literal text not null,
      sound text not null,
      meaning text not null,
      primary key (id)
    );");

    $data = json_decode(file_get_contents("db_files/kanji.txt"),true);
    $hanja = json_decode(file_get_contents("db_files/hanja.json"),true);

    // Kanji set-up from 'kanji.txt'.
    $stmt = $db->prepare("insert into kanji (literal, on_yomi, kun_yomi, meaning, stroke_count) values (?,?,?,?,?);");
    foreach ($data['character'] as $x) {
      $stmt->bind_param('ssssi', $x['literal'],$x['on_yomi'],$x["kun_yomi"],$x['meaning'],$x['stroke_count']);
      if(!$stmt->execute()){
        echo 'Could not add kanji';
      }
    }

    // Hanja table data insertion from hanja.json
    $f = $db->prepare("insert into hanja (literal, sound, meaning) values (?,?,?);");
    for($i = 0; $i <= 7948;$i++  ){
      $sounds = "";
      $meanings = "";
      foreach ($hanja[$i]['sounds'] as $x) {
        $sounds = $sounds . $x . ', ';
      }
      foreach ($hanja[$i]['meanings'] as $x) {
        $meanings = $meanings . $x . ', ';
      }
      $sounds = trim($sounds, ', ');
      $meanings = trim($meanings, ', ');
      $f->bind_param("sss", $hanja[$i]['hanja'], $sounds, $meanings);
      if(!$f->execute()){
        echo 'could not add';
      }
    }
?>
