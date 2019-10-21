<?php
    require_once "./connection.php";
    mysql_query("set names utf8");

    $sql="select * from s_newsList  ";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_all($result,MYSQLI_ASSOC);

    $data = array(  "news" =>$my,);
    $state="0";
    $json = array (
    "state"=>$state,
    "data"  =>$data,
        );
     echo json_encode($json);  
    mysqli_close($conn);
?>