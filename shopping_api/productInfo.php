<?php
    require_once "./connection.php";
    mysql_query("set names utf8");


    $id=@$_GET['id'];
     // echo $id;
    $sql="select * from s_product where productId='$id' ";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_object($result);

    $data = array(  "productList" =>$my,);
    $state="0";
    $json = array (
    "state"=>$state,
    "data"  =>$data,
        );
     echo json_encode($json);  
    mysqli_close($conn);
?>