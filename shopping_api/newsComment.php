<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
    
    $id=@$_GET['id'];

    $sql="select * from s_newComment  where id=$id ";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_all($result,MYSQLI_ASSOC);
// mysql_fetch_row



    $data = array(  "newComment" =>$my,);
    $msg="0";
    $json = array (
    "state"=>$msg,
    "data"  =>$data,
        );    
         echo json_encode($json);  
    mysqli_close($conn);
?>