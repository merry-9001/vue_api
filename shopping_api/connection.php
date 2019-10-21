<?php
 header("Content-Type:text/html;charset=utf8"); 
 header("Access-Control-Allow-Origin:*");
 header('Access-Control-Allow-Methods:GET, POST, PUT, DELETE, OPTIONS');
$servername="usxjsj.cn";
$username="u16147230";
$userpwd="xg1511";
$db="db16147230";
/*$table="p_admin";*/
 $conn=mysqli_connect($servername,$username,$userpwd,$db);
// if(!$conn)
// {
//     echo 'connection not ok<br/>';
// }
// else
// {
// 	echo 'ok!';
// }
$conn->query("SET NAMES utf8");// 解决中文乱码
// Check connection
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
// if(!mysqli_select_db($conn))
// {
//     echo '数据库选择 not ok<br/>';
// }
// else
// {
// 	echo 'ok!';
// }

?>
