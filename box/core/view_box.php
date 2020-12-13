<?php
class view_box{

  private $assign = [];
  private $assign_var =  [];
  private $assign_array = [];

  function __construct(){

    include(__BOX_PATH."/settings/config.php");

  }

  public function assign_to(array $data){

  }


  public function view(){
    $path = func_get_arg(0);

    $this->assign = func_get_args();
    //assign data to var or array
    if(func_num_args() > 1 ){



        for($cnt = 1; $cnt <= (func_num_args()-1);$cnt++){

            //array_push($this->assign,func_get_arg($cnt));
            foreach(func_get_arg($cnt) as $key => $value){

                if(is_array($value)){
                  array_push($this->assign_array,func_get_arg($cnt));
                  break;
                }
                else{
                  array_push($this->assign_var,func_get_arg($cnt));
                  break;
                }

            }
        }


    }

//  $numargs = func_num_args();

  //  $this->assign = $data1;

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
      $count = 0;

      foreach($this->assign_var as $key => $val){
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
      $page = ($count > 0) ?: str_replace($obj1, " ", $page);
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
