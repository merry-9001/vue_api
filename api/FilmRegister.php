<?php
    require_once "./connection.php";
    mysql_query("set names utf8");  
    $name=@$_POST['username'];
    $upwd=@$_POST['password'];

    $sql="select * from f_user WHERE username = '$name' ";
    $result=mysqli_query($conn,$sql);
    $my=mysqli_fetch_object($result);
    if ($my)
    {
        $msg="用户名已存在";
        $state='-1';
        $json = array (
        "msg"=>$msg,
        "stauts"  =>$state,
        "name"=>$name,
            );
         echo json_encode($json);  
    }else{
        $src="http://120.27.1.3/api/upload/2.jpg";
        $cmd="insert into f_user(username,password,src)values('$name','$upwd','$src')";
        $result=mysqli_query($conn,$cmd);
        $msg="ok";
        $state='0';
        $json = array (
        "msg"=>$msg,
        "stauts"  =>$state,
            );
         echo json_encode($json);  
    }

    mysqli_close($conn);
?>