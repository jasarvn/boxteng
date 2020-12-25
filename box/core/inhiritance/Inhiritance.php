<?php


require_once("Content.php");
require_once("Template.php");
trait Inhiritance
{

  use Content;
  use Template;

  protected function init_inhiritance($page){
    if(preg_match(TEMP_CONT_NAME_CONTENT, $page, $matches)>=1){

      $page = $this->process_inhiritance($page);

      return $page;
    }
    else{
      return $page;
    }
  
    return $content_page;
  }

  private function process_inhiritance($page){

    //process content page
    $content_page = $this->get_content($page);


    $template_page = $this->get_template($content_page);

    $page = $template_page;


    return $page;

  }




}
