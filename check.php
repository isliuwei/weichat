<?php
	
	//接收数据
	$username = $_GET['username'];
	//echo $username;


	//@连接数据库
	include "connMysql.php";


	//$sql = "select t_user.username from t_user where username = '$username'";
	$sql = "select * from t_user where username = '$username'";
	//echo $sql;

	$query = mysqli_query($db, $sql);
	// echo $query -> num_rows;
	// die();

	if($query -> num_rows > 0){
		echo "success";
	}else{
		echo "fail";
	}