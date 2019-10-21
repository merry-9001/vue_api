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
    $id=@$_POST['id'];
    $src=@$_POST['src'];
    $date=date("Y-m-d H:i:s");


    $sql="update m_product set type='$type',describes='$describe',income='$income',expend='$expend',cash='$cash',remark='$remark',date='$date',src='$src' where id='$id'";
    $result=mysqli_query($conn,$sql);
    if ($result)
    {
        $msg="ok";
        $state='0';
        $json = array (
        "msg"=>$msg,
        "stauts"  =>$state,
        "result"=>$result
            );
         echo json_encode($json);  
    }else{
          $state='-1';
          $msg='修改未成功';
            $json = array (
            "stauts"  =>$state,
            "msg"=>$msg,
            "src"=>$src
        );  
         echo json_encode($json);  
    }

    mysqli_close($conn);
?>