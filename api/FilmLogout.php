<?php
    require_once "./connection.php";
    session_start();
    header ( "Content-type: text/html; charset=UTF-8" );                        //设置文件编码格式
    session_destroy();
        $msg="ok";
        $state='0';
        $json = array (
        "msg"=>$msg,
        "state"  =>$state,
            );
         echo json_encode($json);  

?>