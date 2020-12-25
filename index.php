<?php
require_once("box/core/view_box.php");

define("__PATH",__dir__);


$test2 = new view_box();

$data3 = array(
            "title"=>"templates",
             "body"=>"THIS IS THE BODY",
             "testing"=>"jasper arvin l. abella",
        );
$data4 = array(
            "test"=>$data3,
          );



$test2->set_data(array("data5"=>$data3));

$test2->view('/sub_view/test2.php',$data4,$data3);






//echo $matches[0][1];
