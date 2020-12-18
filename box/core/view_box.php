<?php
require_once("Init.php");

class view_box extends Init{

  function __construct(){

    //define("__PATH",__dir__); update when installed
    include( __PATH."/box/settings/config.php");

  }

  public function view(){

    $this->set_assign(func_get_args());

    $this->set_values(func_num_args());

    $page = $this->page_init(__VIEW_PATH.$this->view_path);

    //process inhiritance
    $content = $this->init_inhiritance($page);
    
    //process variable
    $page = $this->process_variable($page);

    //compile
    $page = $this->compile_page($page);

  }





  private function process_variable($page){
    //process variable template from page
    $pattern = "/{{\w+}}/";

    preg_match_all($pattern, $page, $matches);

    $tempObjects = $matches[0];

    foreach ($tempObjects as $obj1){

      $obj = preg_split("/\W+/", $obj1);
      $obj = $obj[1];
      $count = 0;

      foreach($this->get_assign_var() as $key => $val){
          if(array_key_exists($obj,$val)){

              $page = str_replace($obj1, $val[$obj], $page);
              $count = 0;
              break;
          }
          else{
            $count++;
          }
      }

      /*if($count >=1 ){
        $page = str_replace($obj1, " ", $page);
      }*/
      $page = ($count > 0) ? str_replace($obj1, " ", $page):$page;
    }

    return $page;
  }

  private function compile_page($page){
    $temp = tmpfile();

    fwrite($temp, $page);

    $path = stream_get_meta_data($temp)['uri'];

    fseek($temp, 0);

    include($path);

    fclose($temp);
  }

}
