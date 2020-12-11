<?php
require_once("box/core/view_box.php");

define("__PATH",__dir__);
define("__BOX_PATH", __PATH."/box"); //update to project path

$test2 = new view_box();

$data3 = array(
            "title"=>"templates",
            "body"=>"jasper"
        );


        $data2 = array(
                    "title"=>"templates",
                    "body"=>"jasper"
                );


$test2->view('/sub_view/test2.php',$data2,$data3);






//echo $matches[0][1];
