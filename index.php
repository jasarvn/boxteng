<?php
require_once("box/core/view_box.php");

define("__PATH",__dir__);
define("__BOX_PATH", __PATH."/box"); //update to project path

$test2 = new view_box();

$data3 = array(
            "titl"=>"templates",
            "bod"=>"jasper"
        );


        $data4 = array(
                    "title"=>"templats1",
                    "body"=>"arvin"
                );


        $data2 = array(
                  "test_array" => $data3
                );


$test2->view('/test.html',$data2,$data3,$data2,$data3,$data4);






//echo $matches[0][1];
