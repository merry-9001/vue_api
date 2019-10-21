<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
     session_start();   
    $name=@$_POST['username'];
    $state=@$_POST['updateState'];
// echo json_encode($name);
    $sql="update f_user set freeze=$state where username='$name' ";
    $result=mysqli_query($conn,$sql);
    if ($result)
    {
        $msg="ok";
        $json = array (
        "msg"=>$msg,
            );
         echo json_encode($json);  
    }else{
        $msg="no";
        $json = array (
        "msg"=>$msg,
            );
         echo json_encode($json);  
    }

    mysqli_close($conn);
?>