<?php
	if(isset($_POST['update-btn'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sign = $_POST['sign'];
		$userId = $_POST['user_id'];

		//@连接数据库
		include "connMysql.php";

		/*
			UPDATE table_name
			SET column1=value1,column2=value2,...
			WHERE some_column=some_value;
		*/



		$sql = "update  t_user set username='$username',password='$password',sign='$sign' 	  where id = '$userId'";
        //echo $sql;


        $query = mysqli_query($db, $sql);

        if($query){
        	echo "<script>alert('修改成功!返回登录页面重新登录！')</script>";
        	header("Location: login.php");
        }


		


	}




