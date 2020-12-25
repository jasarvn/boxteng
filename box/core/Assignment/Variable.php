<?php
/**
 *
 */
trait Variable
{
  protected function process_template_variable($page){
    //process variable template from page

    preg_match_all(VARIABLE, $page, $matches);

    $tempObjects = $matches[0];

    foreach ($tempObjects as $obj1){

      $obj = preg_split(CONT_TEMPLATE_VARIABLE, $obj1);
      $obj = $obj[1];

      //update

      if(array_key_exists($obj,$GLOBALS)){

          $page = str_replace($obj1, $GLOBALS[$obj], $page);
      }
      else{
        $page = str_replace($obj1, " ", $page);
      }

    }

    return $page;
  }

}
