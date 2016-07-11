<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>register</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

	<div class="container">
		<div class="panel panel-primary col-md-4 col-md-offset-4">
		  	<!-- Default panel contents -->
		  	<div class="panel-heading">用户注册</div>
		  	<div class="panel-body">
	    		<form action="register.php" method="post">
	    			<div class="form-group">
		    			<label for="username">用户名</label>
		    			<input type="text" name="username" class="form-control" id="username" placeholder="请输入用户名">
	  				</div>
	  				<div class="form-group">
		    			<label for="password">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
		    			<input type="password" name="password" class="form-control" id="password" placeholder="请输入密码">
	  				</div>
	  				<div class="form-group">
		    			<label for="password1">确认密码</label>
		    			<input type="password" name="password1" class="form-control" id="password1" placeholder="请再次输入密码">
	  				</div>
	  				<div class="form-group">
		    			<label for="sign">个人签名</label>
		    			<input type="text" name="sign" class="form-control" id="sign" placeholder="请输入个人签名">
	  				</div>


	  				<button class="btn btn-success" type="submit" name="sign-btn">注册</button>
	  				<button class="btn btn-default" type="reset">重置</button>
	  				<a href="login.php">返回登录页面</a>
	    		</form>
	  		</div>
	  	</div>
	</div>

<?php

	if(isset($_POST['sign-btn'])){

		//接收表单数据
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
		$sign = $_POST['sign'];

		//进行输入验证
		if($username == "" || $password == "" || $password1 == "" || $sign == ""){
			//echo "<script>alert(\"注册信息填写不完整！\")</script>";
			echo "<script>alert('注册信息填写不完整！')</script>";
		}else{
			if( $password != $password1){
				echo "<script>alert('两次密码输入不一致！')</script>";
			}else{
				//连接数据库，进行添加用户操作

				//@连接数据库
				include "connMysql.php";




				/*
				INSERT INTO table_name ( field1, field2,...fieldN )
                       VALUES
                       ( value1, value2,...valueN );
                */
                //注意: values列表中值要加单引号

                $sql = "insert into t_user (username,password,sign)
                		values('$username','$password','$sign')";
               	// echo $sql;


              	$query = mysqli_query($db, $sql);
              	if( $query ){
                    echo "<script>alert('注册成功!返回登录页面!');</script>";
                    echo "<script>location = 'login.php';</script>";
                }else{
                    echo "<script>alert('注册失败!请重新注册!');</script>";
                    echo "<script>location = 'register.php';</script>";
                }










			}
		}

		//连接数据库






	}
?>


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$('#username').on('blur',function(){
		var $username = $(this).val().trim();

		if($username==''){
			alert("用户名为空！");
		}else{
			$.get('check.php',{username:$username},function(res){
				$res = $(res);
				if(res.trim()=="success"){
					alert("用户名重复,请重新输入");
				}else{
					alert("用户名可以使用");

				}

			},'text')
		}

		/*
		if($username==''){
			alert("用户名为空！");
		}else{
			$.ajax({
				method: 'GET',
				url: 'check.php',
				data: {username:$username},
				dataType: "text",
			}).done(function(res){
				$res = $(res);
				if(res.trim() == "success"){
					alert("用户名重复,请重新输入");
				}else{
					alert("用户名可以使用");
				}
			});
		}
		*/

		/*
		if($username==''){
			alert("用户名为空！");
		}else{
			$.ajax({
				method: 'GET',
				url: 'check.php',
				data: {username:$username},
				dataType: "text",
				success: function(res){
					$res = $(res);
					if(res.trim() == "success"){
						alert("用户名重复,请重新输入");
					}else{
						alert("用户名可以使用");
					}
				}

			});
		}
		*/

	});




</script>

</body>
</html>
