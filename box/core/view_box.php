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
    echo $this->process_inhiritance($page);
    exit;

    //process variable
    $page = $this->process_variable($page);

    //compile
    $page = $this->compile_page($page);

  }

  private function process_inhiritance($page){

    // -> content file
    $pattern = "/templ*\w+=\W\w+.\w+\W|section=\W\w+\W|{%section\W+\w+\W+}((.|\n)*){%sectionend%}/";



    preg_match_all($pattern, $page, $matches);
    $cnt = 0;
    $obj = $matches[$cnt];

    $content_page = [];
    //$pattern = "/templ*\w+=\W\w+.\w+\W/";

    $patterns = array(
                  "/templ*\w+=\W\w+.\w+\W/",
                  "/sec\w+\W+\w+\W/",
                  "/{%section\W+\w+\W+}((.|\n)*){%sectionend%}/"
                );

          for($cnt = 0; $cnt<=2; $cnt++){

            $match = $this->get_match_value($patterns[$cnt],$obj);

            if($cnt == 0){
            //first template file
              $template_path = $this->process_value($match[0],$cnt);
              array_push($content_page,array("template_path"=>$template_path));
            }
            else if ($cnt == 1){
            //second content name
              $template_content_name = $this->process_value($match[0],$cnt);
              array_push($content_page,array("template_content_name"=>$template_content_name));
            }
            else{
            //content
              $template_content = $this->process_value($match[0],$cnt);
              array_push($content_page,array("template_content"=>$template_content));
           }
         }



    //var_dump($template_file);



    echo $template_content;

    var_dump($content_page);


    //$obj = preg_split("/\W+/", $matches[0]);

    // get template file

    // get content name

    // get content

    // -> template file

    // insert content from content file to content template file
  }

  private function get_match_value($pattern,$obj){
    foreach ($obj as $val){
      preg_match_all($pattern,$val, $template);
      if(count($template[0])>0){
          break;
      }
    }

    return $template;
  }


  private function process_value($template_file,$process_type){

    switch ($process_type){
      case 0 :
        $val = str_replace("\"","",explode("=",$template_file[0])[1]);
        break;
      case 1 :
        $val = str_replace("\"","",explode("=",$template_file[0])[1]);
        break;
      case 2 :
        $val = preg_replace("/{%s\w+\W+\w+\W%}|{%s\w+%}/","",$template_file[0]);
        break;
    }

      return $val;
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
