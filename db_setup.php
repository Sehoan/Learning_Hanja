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
?>
