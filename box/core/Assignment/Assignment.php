<?php
require_once("Variable.php");

trait Assignment {

  use Variable;

// update to $globals

  protected $assign = [];

  protected $view_path;

  public function set_data(array $data){
    foreach ($data as $key => $value){
      $GLOBALS[$key] = $value;
    }
  }


  protected function set_assign($val){
    $this->assign = $val;
    $this->view_path = $this->assign[0];
  }

  protected function get_assign(){
    return $this->assign;
  }

  protected function set_values($num){
    //assign data to var or array
    if($num > 1 ){

        for($cnt = 1; $cnt <= ($num-1);$cnt++){
          $this->set_data($this->get_assign()[$cnt]);
        }//-> end of for

    } //-> end of main if

  }



}
