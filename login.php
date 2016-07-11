<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

	<div class="container">
		<div class="panel panel-primary col-md-4 col-md-offset-4">
		  	<!-- Default panel contents -->
		  	<div class="panel-heading">用户登录</div>
		  	<div class="panel-body">
	    		<form action="login.php" method="post">
	    			<div class="form-group">
		    			<label for="username">用户名</label>
		    			<input name="username" type="text" class="form-control" id="username" placeholder="请输入用户名">
	  				</div>
	  				<div class="form-group">
		    			<label for="password">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
		    			<input name="password" type="password" class="form-control" id="password" placeholder="请输入密码">
	  				</div>

            <select class="time" name="expire">

              <option value="1">保存时间</option>
              <option value="24">一天</option>
              <option value="168">一周</option>
              <option value="720">一个月</option>


            </select>
            <br>
            <br>


	  				<button name="sub-btn" class="btn btn-success" type="submit">登录</button>
	  				<button class="btn btn-default" type="reset">重置</button>




            <br>
	  				<p style="padding-top: 20px;">
	  				  <a href="register.php" >前往注册页面</a>
	  				</p>
	    		</form>
	  		</div>
	  	</div>
	</div>




<?php



	//开启一个会话


	if(isset($_POST['sub-btn'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
    	$cooktime = $_POST['expire'];

		//连接数据库
		include "connMysql.php";


		$sql = "select * from t_user where username = '$username' and password = '$password'";

		//数据库进行查询 返回资源类型
		$query = mysqli_query($db, $sql);


		//将资源类型转换成数组类型
        $result = mysqli_fetch_array($query);


        // echo "<pre>";
        //    var_dump($result);
       	// echo "</pre>";

       	//将查出的数据存在session中

       	if($result){
       	// 	$_SESSION['user_id']=$reseult['id'];
          //   $_SESSION['username']=$reseult['username'];
            setcookie('id', $result['id'],time()+3600*$cooktime);
            setcookie('username', $result['username'],time()+3600*$cooktime);
            setcookie('sign', $result['sign'],time()+3600*$cooktime);
            echo "<script>location = 'index.php'</script>";
            //header('Location: index.php');
       	}else{
       		//echo "用户名或密码错误，请重新登录！";
       		header('Location: login.php');
       		//echo "<script>location = 'login.php'</script>";

       	}




	}













?>


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
