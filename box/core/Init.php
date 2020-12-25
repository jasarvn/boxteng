<?php
require_once("Assignment\Assignment.php");

require_once("inhiritance\Inhiritance.php");

abstract class Init{
  use Assignment, Inhiritance;

  protected function page_init($path){
    if(file_exists($path)){
        $page = file_get_contents($path);
        return $page;
    }
    else{
        echo "File does not exist!";
        exit;
    }

  }

}
