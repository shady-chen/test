<?php


if(!empty($_POST))//入口
{
	
	/******************记录下用户名和密码 ******************************/ 
	$nickname = $_POST['nickname'];
	$username = $_POST['username'];
	$psd = md5($_POST['mypassword']);

	/********************************下载图片*********************/ 
	$path_pic = "download/init.jpg";//如果用户没有上传头像,则用这个默认头像;
	if(!empty($_FILES))//入口,判断文件是不是为空,不为空才继续;
	{
			//判断点出现的位置
			$last = strrpos($_FILES['myfile']['name'], '.');
			//截取字符串 获得图片的后缀名 包括点
			$suffix = substr($_FILES['myfile']['name'], $last);
			// 常用的照片后缀
			$arr_pic = ['.png','.jpg','.gif','.jpeg'];
			if(!in_array($suffix, $arr_pic))
			{
				echo '系统会使用默认头像';
				
			}
			// 判断文件的大小  不能太大了 也没法上传
			if($_FILES['myfile']['size']>1024*1024)
			{
				echo '您的文件太大';
				exit;
			}
			//保存位置
			$path_pic = 'download/'.mt_rand().time().$suffix;
			move_uploaded_file($_FILES['myfile']['tmp_name'],$path_pic);
	
	}
	/********************************下载图片*********************/ 

	/***************************将数据上传到数据库*********************/ 
		$mysqli = mysqli_connect('localhost','root','','webchat');
		mysqli_query($mysqli,"set names utf8");
		$sql = "INSERT INTO `user`(`nickname`,`username`,`password`,`pic`) VALUES('$nickname','$username','$psd','$path_pic')";
		$result = mysqli_query($mysqli,$sql);
		
	/***************************将数据上传到数据库*********************/
	/*****************************************************************
		判断用户是否插入成功，从而跳转到聊天界面
		mysqli_affected_rows(数据库连接标识)
		在php中使用JavaScript语句 使用字符串的方式输出
		如:echo '<script></script>'
	*********************************************************************/ 
	if(mysqli_affected_rows($mysqli))
	{
		echo "<script>alert('登录成功,即将进入登录页面');window.location.href='login.php'</script>";
	}
}


include('register.html');







?>