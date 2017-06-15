<?php

//获取传递的参数
$username = $_POST['username'];

//连接数据库

$mysqli = mysqli_connect('localhost','root','','webchat');
mysqli_query($mysqli,'set names utf8');
$sql = "SELECT * FROM `user` WHERE `username` ='$username'";
$result = mysqli_query($mysqli,$sql);
$arr = mysqli_fetch_assoc($result);
if(empty($arr))
{
	echo 1;//说明数据库中检测不到,即使可以使用
}
else
{
	echo 0;
}


?>