<?php

session_start();

if(!empty($_SESSION['username']))
{
	/***************************LIST************************************/
	$mysqli = mysqli_connect('localhost','root','','webchat');
	mysqli_query($mysqli,'set names utf8');
	$sql = "SELECT * FROM `user`";
	$result = mysqli_query($mysqli,$sql);
	$newArr = array();
	while ($arr = mysqli_fetch_assoc($result)) {
		$newArr[] = $arr;//跟push一样 把数据插入进去;
	}
	
	/***************************CHATTING************************************/
	if(!empty($_POST['content']))
	{
		$userid = $_SESSION['userid'];
		$systime = time();
		$content = $_POST['content']; //获取用户输入的内容;
		$mysqli_chat = mysqli_connect('localhost','root','','webchat');
		mysqli_query($mysqli_chat,'set names utf8');
		$sql = "INSERT INTO `chat`(`userid`,`content`,`systime`) VALUES('$userid','$content','$systime')";
		mysqli_query($mysqli_chat,$sql);
		if(mysqli_affected_rows($mysqli_chat))//检查是否已经将数据插入到数据库中
		{
			//echo "<script>alert('OK')</script>";
			//提取数据库中的聊天内容
			$mysqli_content = mysqli_connect('localhost','root','','webchat');
			mysqli_query($mysqli_content,'set names utf8');
			$sql_content = "SELECT `user`.`nickname`,`user`.`pic`,`chat`.* FROM `chat` INNER JOIN `user` ON `chat`.`userid`=`user`.`id` ORDER BY `chat`.`systime` ASC";
			$result_content = mysqli_query($mysqli_content,$sql_content);
			$rows = array();
			while($arr_content = mysqli_fetch_assoc($result_content))
			{
				//判断消息列表中是谁发的
				if($_SESSION['userid'] == $arr_content['userid'])
				{//如果登陆userid 和我插入的userid相等的话 那就是我本人发的消息
					$arr_content['is_mine'] = 1;
				}
				else
				{
					$arr_content['is_mine'] = 0;
				}
				$rows[]=$arr_content;
			}
		}

	}
			$mysqli_content = mysqli_connect('localhost','root','','webchat');
			mysqli_query($mysqli_content,'set names utf8');
			$sql_content = "SELECT `user`.`nickname`,`user`.`pic`,`chat`.* FROM `chat` INNER JOIN `user` ON `chat`.`userid`=`user`.`id` ORDER BY `chat`.`systime` ASC";
			$result_content = mysqli_query($mysqli_content,$sql_content);
			$rows = array();
			while($arr_content = mysqli_fetch_assoc($result_content))
			{
				//判断消息列表中是谁发的
				if($_SESSION['userid'] == $arr_content['userid'])
				{//如果登陆userid 和我插入的userid相等的话 那就是我本人发的消息
					$arr_content['is_mine'] = 1;
				}
				else
				{
					$arr_content['is_mine'] = 0;
				}
				$rows[]=$arr_content;
			}
}
else
{
	echo "<script>alert('请登录！');window.location.href='./login.php'</script>";
}
include('./frame/main.html');
?>