<?php
class view_box{

  private $assign = [];

  function __construct(){

    include(__BOX_PATH."/settings/config.php");

  }

  public function view(){
    $path = func_get_arg(0);
    $data1 = func_get_arg(1);
    $var = func_get_arg(2);

   $numargs = func_num_args();

  // var_dump($GLOBALS);

  /* foreach($GLOBALS as $varName => $value) {
      var_dump($varName);

        if ($value === $data1) {
            return $varName;
        }
    }
*/
    $this->assign = $data1;

    //process page
    $page = $this->page_init(__VIEW_PATH.$path);

    $page = $this->process_variable($page);

    $page = $this->compile_page($page);

  }




  private function page_init($path){

    if(file_exists($path)){
        $page = file_get_contents($path);
        return $page;
    }
    else{
        echo "File does not exist!";
        exit;
    }




  }

  private function process_variable($page){
    //process variable template from page
    $pattern = "/{{\w+}}/";

    preg_match_all($pattern, $page, $matches);

    $tempObjects = $matches[0];

    foreach ($tempObjects as $obj1){

      $obj = preg_split("/\W+/", $obj1);
      $obj = $obj[1];
      $page = str_replace($obj1, $this->assign[$obj], $page);

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
