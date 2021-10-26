<?php
/*
 * Author(s): Sehoan Choi (sc8zt)
 */

class Quiz {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function run($action) {
      // run appropriate actions accordingly
        switch($action) {
            case "quiz_form":
                $this->quizForm();
                break;
            case "flashcards":
                $this->flashcards();
                break;
            default:
                $this->quizForm();
                break;
        }

    }

    public function quizForm() {
        include("views/quiz_form.php");
    }

    public function flashcards() {
        include("views/flashcards.php");
    }
}
