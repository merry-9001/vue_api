<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
    $id=@$_GET['id'];


    // $id=substr($id,1);
    // $id=substr($id, 0, -1);
    // echo $id;
    $hello = explode(',',$id);
        $data = array();
    for($i=0;$i<count($hello);$i++)
    {
        $sql="select * from s_product  where productId=$hello[$i] ";
        $result=mysqli_query($conn,$sql);
        $my=mysqli_fetch_object($result);
           // echo json_encode($my); 
        array_push($data,$my);
    }
            $data1 = array("shopping" =>$data);
    $msg="0";

    $json = array (
    "state"=>'0',
    "data"  =>$data1,
        );
           echo json_encode($json);  

    mysqli_close($conn);
?>