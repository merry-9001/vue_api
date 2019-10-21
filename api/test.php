<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
    date_default_timezone_set('PRC'); 
    $id=@$_GET['id'];
$date=date("Y-m-d H:i:s");
    // $result=mysqli_query($conn,$sql);
    // $my=mysqli_fetch_object($result);

    // $data = array(  "users" =>$my,);
    // $msg="ok";
    // $json = array (
    // "msg"=>$msg,
    // "data"  =>$data,
    //     );
    echo $date;
     // echo json_encode($id);  
    // print_r($my);
    mysqli_close($conn);
?>