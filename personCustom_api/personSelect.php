
<?php
    require_once "./connection.php";
    mysql_query("set names utf8");


    $sql="select * from pc_project  ";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_all($result,MYSQLI_ASSOC);

    $data = array(  "personSelect" =>$my,);
    $msg="ok";
    $json = array (
    "msg"=>$msg,
    "data"  =>$data,
        );
     echo json_encode($json);  
    mysqli_close($conn);
?>