<?php
/**
 *
 */
require_once("Content.php");
trait Inhiritance
{

  use Content;

  protected function init_inhiritance($page){
    if(preg_match(TEMP_CONT_NAME_CONTENT, $page, $matches)>=1){

      $page = $this->process_inhiritance($page);
      return $page;
    }
    else{
      return $page;
    }
    //var_dump($matches);

    return $content_page;
  }

  private function process_inhiritance($page){

    //process content page
    $content_page = $this->get_content($page);
    print_r($content_page);
    //process template page

  }


}
