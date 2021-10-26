<?php

class Config {
  public $compID;
  public $project;

  public function __construct() {
    $this->compID = "sc8zt";
    $this->project = "hanja_interpreter";
  }

  public function getURL() {
    return "/{$this->compID}/{$this->project}";
  }
}
