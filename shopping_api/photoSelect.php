<?php
    require_once "./connection.php";
    mysql_query("set names utf8");

    $id=@$_GET['id'];

    $sql="select * from s_photo  where classId='$id' ";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_all($result,MYSQLI_ASSOC);

    $data = array(  "img" =>$my);
    $msg="ok";
    $json = array (
    "msg"=>$msg,
    "data"  =>$data,
        );
    echo json_encode($json);  
    mysqli_close($conn);
?>