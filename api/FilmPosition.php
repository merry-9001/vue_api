<?php
    require_once "./connection.php";


    $data = array(  "nm" =>"杭州","id"=>50);
    $msg="ok";

    $json = array (
    "msg"=>$msg,
    "data"  =>$data,
        );
     echo json_encode($json);  

?>