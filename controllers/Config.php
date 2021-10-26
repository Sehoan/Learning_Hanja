<?php
/*
 * Author(s): Sehoan Choi (sc8zt)
 */

class Config {
  public $compID;
  public $project;

  public function __construct() {
    $this->compID = "sc8zt";
    $this->project = "learning_hanja";
  }

  public function getURL() {
    return "/{$this->compID}/{$this->project}";
  }
}
