<?php
require_once("Assignment.php");
require_once("inhiritance\Inhiritance.php");
require_once("constant\Constant.php");
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
