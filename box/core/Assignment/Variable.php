<?php
/**
 *
 */
trait Variable
{
  protected function process_template_variable($page){
    //process variable template from page

    preg_match_all(TEMPLATE_VARIABLE, $page, $matches);

    $tempObjects = $matches[0];

    foreach ($tempObjects as $obj1){

      $obj = preg_split(CONT_TEMPLATE_VARIABLE, $obj1);
      $obj = $obj[1];

      //update

      if(array_key_exists($obj,$GLOBALS)){
          if(!is_array($GLOBALS[$obj])){
              $page = str_replace($obj1, $GLOBALS[$obj], $page);
          }
          else{
              $page = str_replace($obj1, " ", $page);
          }
      }
      else{
        $page = str_replace($obj1, " ", $page);
      }

    }

    return $page;
  }

  protected function process_php_variable($page){

    preg_match_all(PHP_VARIABLE, $page, $matches);

    $tempObjects = $matches[0];

    foreach ($tempObjects as $obj1){
      $obj = preg_split(CONT_TEMPLATE_VARIABLE, $obj1);
      $obj = $obj[1];
      if(array_key_exists($obj,$GLOBALS)){

          $page = str_replace($obj1, CONT_GLOBAL_START.$obj.CONT_GLOBAL_END, $page);
      }

    }

      return $page;
  }

}
