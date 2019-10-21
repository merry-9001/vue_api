<?php
    require_once "./connection.php";
    mysql_query("set names utf8");


    $id=@$_GET['page'];
    $id=($id-1)*4;
    // echo $id;
    $sql="select * from s_product  limit $id,4";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_all($result,MYSQLI_ASSOC);

    $data = array(  "productList" =>$my,);
    $state="0";
    $json = array (
    "state"=>$state,
    "data"  =>$data,
        );
     echo json_encode($json);  
    mysqli_close($conn);
?>