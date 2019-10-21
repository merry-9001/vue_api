<?php
    require_once "./connection.php";
    mysql_query("set names utf8");  
    $name=@$_POST['username'];

    $sql="DELETE FROM f_user WHERE username='$name'";
    $result=mysqli_query($conn,$sql);
    if ($result)
    {
        $state='成功';
        $json = array (
        "stauts"  =>$state,
            );
         echo json_encode($json);  
    }else{
        $state='失败';
        $json = array (
        "stauts"  =>$state,
            );
         echo json_encode($json);  
    }

    mysqli_close($conn);
?>