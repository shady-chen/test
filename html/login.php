<?php
session_start();//开启session
if(!empty($_POST)) /*入口*/
{
	$username = $_POST['username'];
	$psd = $_POST['mypassword'];
	$mysqli = mysqli_connect('localhost','root','','webchat');
	mysqli_query($mysqli,'set names utf8');
	$sql = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$psd'";
	$result = mysqli_query($mysqli,$sql);
	$arr = mysqli_fetch_assoc($result);
	if(!empty($arr))
	{
		$_SESSION['username'] = $arr['username'];
		$_SESSION['userid'] = $arr['id'];//获取插入数据的id
		echo "<script>alert('登录成功,即将进入聊天页面');window.location.href='./chat.php'</script>";
	}
	else
	{
		echo "账号或者密码错误";
	}
}


include('login.html');

?>