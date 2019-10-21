<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
    
    $id=@$_GET['id'];

    $sql="select * from f_comingsoon  where cityId=$id  order by id desc";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_all($result,MYSQLI_ASSOC);



    $data = array(  "comingList" =>$my,);
    $msg="ok";
    $json = array (
    "msg"=>$msg,
    "data"  =>$data,
        );
     echo json_encode($json);  
    // print_r($my);
    mysqli_close($conn);
?>