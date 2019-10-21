<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
    
    $id=@$_GET['id'];

    $sql="select * from s_productImg  where productId=$id ";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_all($result,MYSQLI_ASSOC);
// mysql_fetch_ro

    $data = array(  "infoImg" =>$my,);
    $msg="0";
    $json = array (
    "state"=>$msg,
    "data"  =>$data,
        );
     echo json_encode($json);  
    // print_r($my);
    mysqli_close($conn);
?>