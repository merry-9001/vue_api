<?php
    require_once "./connection.php";
    mysql_query("set names utf8"); 

    $username=@$_POST['username'];
    $email=@$_POST['email'];
    $password=@$_POST['password'];
    $identity=@$_POST['identity'];

    $sql="select * from m_user WHERE username = '$username' ";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_object($result);
    if ($my)
    {
        $msg="用户名已存在";
        $state='-1';
        $json = array (
        "msg"=>$msg,
        "stauts"  =>$state,
            );
         echo json_encode($json);  
    }else{
        $cmd="insert into m_user(username,email,password,identity)values('$username','$email','$password','$identity')";
        $result=mysqli_query($conn,$cmd);
        $state='0';
        $json = array (
        "stauts"  =>$state,
            );
         echo json_encode($json);  
    }

    mysqli_close($conn);
?>