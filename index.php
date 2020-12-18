<?php
require_once("box/core/view_box.php");

define("__PATH",__dir__);


$test2 = new view_box();

$data3 = array(
            "title"=>"templates",
             "body"=>"templats1",
        );


        $data4 = array(
                 "body"=>"templats1",
                  //  "bod"=>"arvin"
                );


        $data2 = array(
                  "test_array" => $data3
                );

$test2->set_assign_var($data3);
$test2->view('/test.html');






//echo $matches[0][1];
