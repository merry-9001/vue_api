
	<?php 
    require_once "./connection.php";
    mysql_query("set names utf8");
     // session_start();   
         // $uname=$_SESSION['user'];
$rootpath=$_SERVER['DOCUMENT_ROOT'];
$parentPath=dirname(dirname(__FILE__));
// $rootpath=$_SERVER['DOCUMENT_ROOT'];
// $parentPath=dirname(dirname(__FILE__));
if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg" ||$_FILES["file"]["type"]=="image/png" ||$_FILES["file"]["type"]=="image/gif")
&&($_FILES["file"]["size"]<20000000))
{
    if(@$_FILES["file"]["error"]>0)
    {
        echo"Return Code".$_FILES["file"]["error"];
    }
    else
    {
        if(file_exists($parentPath."\\upload\\".@$_FILES["file"]["name"]))
        {
            $msg="ok";
            $state='图片已存在';
            $json = array (
            "msg"=>$msg,
            "state"  =>$state,
                );
             echo json_encode($json);  
        }
        else 
        {
            $ext=pathinfo(@$_FILES["file"]["name"],PATHINFO_EXTENSION);
            list($msec,$sec)=explode(' ',microtime());
            $msectime=(string)sprintf('%.0f',floatval($msec)*1000);
            $newFileName=date("Y-m-d-H-i-s-").$msectime.".".$ext;
          //  echo'新文件名：'.$newFileName;
            // move_uploaded_file(@$_FILES["file"]["tmp_name"], $parentPath."\\upload\\"."\\management\\".$newFileName);
            // move_uploaded_file(@$_FILES["file"]["tmp_name"], 'http://usxjsj.cn:8080/xg16/xg230/management_api'."\\upload\\".$newFileName);
                        move_uploaded_file(@$_FILES["file"]["tmp_name"], $parentPath."\\personCustom_api\\"."\\images\\"."\\admin\\"."\\person\\".$newFileName);
            // $newaddress='http://localhost:8000/upload/'.$newFileName;
            // $sql="update f_user set src='$newaddress'  where username='$uname'";
                    // $address="ok";
                    $state='ok';
                    $json = array (
                    "stauts"  =>$state,
                    "address"=>$newFileName,
                    "aa"=>$parentPath,
                    "rootpath"=>$rootpath
                    // 'address'=>$newaddress,
                        );
                     echo json_encode($json);  
            // $result=mysqli_query($conn,$sql);
            //     if ($result)
            //     {
            //         $msg="ok";
            //         $state='全部成功';
            //         $json = array (
            //         "stauts"  =>$state,
            //         "msg"=>$msg,
            //         'address'=>$newaddress,
            //             );
            //          echo json_encode($json);  
            //     }else{
            //         $msg="ok";
            //         $state='图片上传成，但是失败';
            //         $json = array (
            //         "stauts"  =>$state,
            //         "msg"=>$msg,
            //         'address'=>$newaddress,
            //             );
            //          echo json_encode($json);  
            //     }
        }
    } 
}
else
{
            $msg="no";
            $state='失败';
            $json = array (
            "msg"=>$msg,
            "state"  =>$state,
                );
             echo json_encode($json);  
}
?>