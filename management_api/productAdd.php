<?php
    require_once "./connection.php";
    mysql_query("set names utf8"); 
date_default_timezone_set('PRC'); 
    $type=@$_POST['type'];
    $describe=@$_POST['describes'];
    $income=@$_POST['income'];
    $expend=@$_POST['expend'];
    $cash=@$_POST['cash'];
    $remark=@$_POST['remark'];
    $src=@$_POST['src'];
    $date=date("Y-m-d H:i:s");
// ,remark,type
    // ,'$expend','$remark','$type'
    $cmd="insert into m_product(cash,describes,income,expend,remark,type,date,src)values('$cash','$describe','$income','$expend','$remark','$type','$date','$src')";
    $result=mysqli_query($conn,$cmd);
    if($result)
    {
    $state='0';
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