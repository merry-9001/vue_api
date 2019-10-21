<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
    // date_default_timezone_set('PRC'); 
    $name=@$_POST['project_name'];
    $price=@$_POST['project_price'];
    $introduce=@$_POST['project_introduce'];
    $remake=@$_POST['project_remake'];
    $src=@$_POST['project_src'];

    $id=@$_POST['project_id'];
    $sql="update pc_project set project_name='$name',project_price='$price',project_introduce='$introduce',project_remake='$remake',project_src='$src' where project_id='$id'";
    $result=mysqli_query($conn,$sql);
    if ($result)
    {
        $msg="ok";
        $state='0';
        $json = array (
        "msg"=>$msg,
        "stauts"  =>$state,
        // "result"=>$result,
        // "describe"=>$describe
            );
         echo json_encode($json);  
    }else{
          $state='-1';
          $msg='修改未成功';
            $json = array (
            "stauts"  =>$state,
            // "msg"=>$msg,
            // "src"=>$src
        );  
         echo json_encode($json);  
    }

    mysqli_close($conn);
?>