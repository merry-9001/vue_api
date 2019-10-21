<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
    
    $id=@$_GET['id'];

    $sql="select * from s_newsList  where id=$id ";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_object($result);
// mysql_fetch_row


    $data = array(  "detailNews" =>$my,);
    $msg="0";
    $json = array (
    "state"=>$msg,
    "data"  =>$data,
        );
     echo json_encode($json);  
    // print_r($my);
    mysqli_close($conn);
?>