<?php


/*************************接受表单的值**********************************/
	

	$username = $_POST['username'];
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
	/*if(!empty($_POST['mypassword']))
	{
		$password =$_POST['mypassword'];
	}
	if($psd == $arr['password'])
	{
		echo '登录成功';
	}
	else
	{
		echo '登录失败';
	}*/
	// $sql = "SELECT * FROM `user` WHERE `username`='admin'";
	// $result = mysqli_query($mysqli,$sql);
	// $arr =mysqli_fetch_assoc($result);



/*************************连接数据库**********************************/


?>