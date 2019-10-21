<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
    

    $sql="select * from f_city ";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_all($result,MYSQLI_ASSOC);



    $data = array(  "cities" =>$my,);
    $msg="ok";
    $json = array (
    "msg"=>$msg,
    "data"  =>$data,
        );
     echo json_encode($json);  
    // print_r($my);
    mysqli_close($conn);
?>