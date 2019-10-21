<?php
    require_once "./connection.php";
    mysql_query("set names utf8");  
    session_start();
    // $_SESSION['user']='12';
    error_reporting(0);
    $uname=$_SESSION['user'];

     // echo $uname;
        if($uname)
        {

            $sql="select * from f_user WHERE username = '$uname' ";
            $result=mysqli_query($conn,$sql);
            $my=mysqli_fetch_object($result);

            $msg="ok";
            $state='0';
            $json = array (
            "msg"=>$msg,
            "state"  =>$state,
            "session"=>$uname,
            "data"=>$my,
                );
             echo json_encode($json);  
        }
        else
        {
            $msg="ok";
            $state='-1';
            $json = array (
            "msg"=>$msg,
            "state"  =>$state,
                );
             echo json_encode($json);  
        }

?>