<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
    // error_reporting(0);
     // session_start();   
    $name=@$_POST['username'];
    $upwd=@$_POST['password'];
    $type=@$_POST['type'];

    if($type==2 || $type==3)
    {
        if($type==2)
        {
            $sql="select * from pc_admin WHERE admin = '$name'and password = '$upwd' and type=2 ";
            $result=mysqli_query($conn,$sql);
            $my=mysqli_fetch_object($result);
            // echo json_encode($my);  
            if ($my)
            {
                // $_SESSION['user']=$name; 
                $msg="ok";
                $json = array (
                "msg"=>$msg,
                "type"=>$type,
                // "data"=>$my,
                    );
                 echo json_encode($json);  
            }else{
                  $msg='no';
                    $json = array (
                    "msg"=>$msg,
                    "data"=>$type,
                );  
                 echo json_encode($json);  
            }
        }
        else
        {
            $sql="select * from pc_admin WHERE admin = '$name'and password = '$upwd' and type=3 ";
            $result=mysqli_query($conn,$sql);
            $my=mysqli_fetch_object($result);
            // echo json_encode($my);  
            if ($my)
            {
                // $_SESSION['user']=$name; 
                $msg="ok";
                $json = array (
                "msg"=>$msg,
                "type"=>$type,
                // "data"=>$my,
                    );
                 echo json_encode($json);  
            }else{
                  $msg='no';
                    $json = array (
                    "msg"=>$msg,
                    "data"=>$type,
                );  
                 echo json_encode($json);  
            }
        }

    }
    else
    {
        $sql="select * from pc_user WHERE username = '$name'and password = '$upwd' and freeze = '1'";
        $result=mysqli_query($conn,$sql);
        $my=mysqli_fetch_object($result);
        // echo json_encode($my);  
        if ($my)
        {
            // $_SESSION['user']=$name; 
            $msg="okok";
            $json = array (
            "msg"=>$msg,
            "data"=>$my,
            // "data"=>$my,
                );
             echo json_encode($json);  
        }else{
              $msg='no';
                $json = array (
                "msg"=>$msg,
            );  
             echo json_encode($json);  
        }   
    }
    mysqli_close($conn);
?>