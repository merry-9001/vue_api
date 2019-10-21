<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
     session_start();   
    $name=@$_POST['username'];
    $upwd=@$_POST['password'];

    //     $json = array (
    //     "msg"=>$name,
    //     "state"  =>$upwd,
    //         );
    // echo json_encode($json);  

    $sql="select * from f_user WHERE username = '$name'and password = '$upwd' and freeze=0";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_object($result);
    if ($my)
    {
        $_SESSION['user']=$name; 
        $msg="ok";
        $state='0';
        $json = array (
        "msg"=>$msg,
        "stauts"  =>$state,
        "ses"=>$_SESSION['user'],
        "data"=>$my,
            );
         echo json_encode($json);  
    }else{
        $msg="no";
        $state='-1';
        $json = array (
        "msg"=>$msg,
        "stauts"  =>$state,
            );
         echo json_encode($json);  
    }

    mysqli_close($conn);
?>