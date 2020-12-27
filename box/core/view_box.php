<?php
require_once("Init.php");
require_once("constant\Constant.php");
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
    $page = $this->init_inhiritance($page);

    //process variable
    $page = $this->process_template_variable($page);

    $page = $this->process_php_variable($page);

    //process array
    //  echo htmlspecialchars($page);
    //  exit;

    //compile
    $page = $this->compile_page($page);

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
