<?php
// 1:连接数据库 mysqli_connect('服务器地址','用户名','密码','数据库名称');
$mysqli = mysqli_connect('localhost','root','','webchat');

//2:防止乱码 设置字符集编码 mysqli_query(已经链接的数据库($mysqli),'set names uft8');

mysqli_query($mysqli,'set names utf8');


//3:写一个sql语句

$sql ="SELECT * FROM user";  //查询表(user)里面的内容

//4:执行$sql语句;
$rel = mysqli_query($mysqli,$sql); //返回一个结果集(object)

//5:将结果集转换成数组
$arr = mysqli_fetch_assoc($rel);

print_r($arr);


?>