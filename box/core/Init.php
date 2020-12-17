<?php
require_once("Assignment.php");
abstract class Init{
  use Assignment;

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
