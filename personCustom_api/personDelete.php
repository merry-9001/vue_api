<?php
    require_once "./connection.php";
    mysql_query("set names utf8");  
    $id=@$_POST['id'];

    $sql="DELETE FROM pc_project WHERE project_id='$id'";
    $result=mysqli_query($conn,$sql);
    if ($result)
    {
        $state='ok';
        $json = array (
        "stauts"  =>$state,
        "sad"=>$id
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