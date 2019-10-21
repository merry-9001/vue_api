<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
     // session_start();   
    $name=@$_POST['username'];
    $upwd=@$_POST['password'];

    $sql="select * from m_user WHERE username = '$name'and password = '$upwd'";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_object($result);
    if ($my)
    {
        // $_SESSION['user']=$name; 
        $msg="ok";
        $state='0';
        $json = array (
        "msg"=>$msg,
        "stauts"  =>$state,
        "data"=>$my,
        // "data"=>$my,
            );
         echo json_encode($json);  
    }else{
          $state='-1';
          $msg='添加未成功';
            $json = array (
            "stauts"  =>$state,
            "msg"=>$msg,
        );  
         echo json_encode($json);  
    }

    mysqli_close($conn);
?>