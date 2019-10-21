<?php
    require_once "./connection.php";
    mysql_query("set names utf8"); 
// date_default_timezone_set('PRC'); 
    $name=@$_POST['project_name'];
    $price=@$_POST['project_price'];
    $introduce=@$_POST['project_introduce'];
    $remake=@$_POST['project_remake'];
    $src=@$_POST['project_src'];
    // $remark=@$_POST['remark'];
    // $src=@$_POST['src'];
    // $date=date("Y-m-d H:i:s");
// ,remark,type
    // ,'$expend','$remark','$type'
    $cmd="insert into pc_project(project_name,project_price,project_introduce,project_remake,project_src)values('$name','$price','$introduce','$remake','$src')";
    $result=mysqli_query($conn,$cmd);
    if($result)
    {
    $state='ok';
    $json = array (
    "stauts"  =>$state,

        );
    }
    else
    {
          $state='-1';
          $msg='添加未成功';
            $json = array (
            "stauts"  =>$state,
            "msg"=>$msg,
                );  
    }
    echo json_encode($json);  

    mysqli_close($conn);
?>