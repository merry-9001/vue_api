<?php
    require_once "./connection.php";
    mysql_query("set names utf8");
    date_default_timezone_set('PRC');   
    $content=@$_POST['content'];
    $id=@$_POST['id'];
    $date=date("Y-m-d H:i:s");


        $cmd="insert into s_newComment(id,comment_time,comment_content)values('$id','$date','$content')";
        $result=mysqli_query($conn,$cmd);
        $json='';
        if($result)
        {
            $state='0';
            $json = array (
            "stauts"  =>$state,
                );
        }

         echo json_encode($json);  

    mysqli_close($conn);
?>