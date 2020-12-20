<?php
trait Template{

  private function get_template($content_page){

    $template_page = $this->page_init(__VIEW_PATH.$content_page['template_path']);

    $pattern = CONT_NAME_START.$content_page["template_content_name"].CONT_NAME_END;

    if(preg_match($pattern,$template_page,$matches)){
      $template_page = preg_replace($pattern, $content_page["template_content"], $template_page);
    }else{
      $template_page = preg_replace(DEFAULT_CONTENT, " ", $template_page);
    }
    return $template_page;
  }


}
