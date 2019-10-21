<?php
    require_once "./connection.php";
    mysql_query("set names utf8");  
    $id=@$_POST['id'];

    $sql="DELETE FROM m_product WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    if ($result)
    {
        $state='0';
        $json = array (
        "stauts"  =>$state,
            );
         echo json_encode($json);  
    }else{
        $state='-1';
        $msg='删除失败';
        $json = array (
        "stauts"  =>$state,
        "msg"=>$msg
            );
         echo json_encode($json);  
    }

    mysqli_close($conn);
?>