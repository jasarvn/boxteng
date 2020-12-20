<?php
/**
 *
 */
trait Content
{
  private function get_content($page)
  {
    $content_page = [];
    preg_match_all(GET_WHOLE_TEMP_CONT, $page, $matches);
    $cnt = 0;
    $obj = $matches[$cnt];


    //$pattern = "/templ*\w+=\W\w+.\w+\W/";
          for($cnt = 0; $cnt<=2; $cnt++){

            $match = $this->get_match_value(PATTERNS[$cnt],$obj);

            if($cnt == 0){
            //first template file
              $template_path = $this->process_value($match[0],$cnt);
              $content_page["template_path"] = $template_path;
              //array_push($content_page,array("template_path"=>$template_path));
            }
            else if ($cnt == 1){
            //second content name
              $template_content_name = $this->process_value($match[0],$cnt);
              $content_page['template_content_name'] = $template_content_name;
              //array_push($content_page,array("template_content_name"=>$template_content_name));
            }
            else{
            //content
              $template_content = $this->process_value($match[0],$cnt);
              $content_page['template_content'] = $template_content;
              //array_push($content_page,array("template_content"=>$template_content));
           }
         }

    return $content_page;
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


}
