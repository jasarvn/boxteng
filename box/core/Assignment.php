<?php
trait Assignment {

  protected $assign = [];

  protected $assign_var =  [];

  protected $assign_array = [];

  protected $view_path;

  protected function get_view_path(string $path){
    return $path;
  }

  protected function set_assign($val){
    $this->assign = $val;
    $this->view_path = $this->assign[0];
  }

  protected function get_assign(){
    return $this->assign;
  }


  protected function get_assign_array(){
    return $assign_array;
  }

  public function set_assign_array($val){
    array_push($this->assign_array,$val);
  }

  public function set_assign_var($val){
    array_push($this->assign_var,$val);
  }

  protected function get_assign_var(){
    return $this->assign_var;
  }


  protected function set_values($num){
    //assign data to var or array
    if($num > 1 ){

        for($cnt = 1; $cnt <= ($num-1);$cnt++){

            //array_push($this->assign,func_get_arg($cnt));
            foreach($this->get_assign()[$cnt] as $key => $value){

                if(is_array($value)){
                  //array_push($this->assign_array,$this->get_assign()[$cnt]);
                  $this->set_assign_array($this->get_assign()[$cnt]);
                  break;
                }
                else{
                  $this->set_assign_var($this->get_assign()[$cnt]);
                  break;
                } //-> end of if

            }//-> end of foreach
        }//-> end of for

    } //-> end of main if

  }



}
