<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

</head>
<body>

	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
			<a class="navbar-brand" href="#">
        <i class="fa fa-wechat"></i>
      </a>

      <a class="navbar-brand" href="#">微信</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">首页 <span class="sr-only">(current)</span></a></li>
				<li><a href="#">联系我</a></li>
				<li><a href="setting.php">关于我</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-tag"></i> <?php echo $_COOKIE['sign'] ?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-user"></i>
						<?php


						$username = $_COOKIE['username'];
						//$username = $_SESSION['username'];
						//echo $username;
				        if($username){
				            echo $username." 已登录 ";
				        }else{
				            echo "<script>location = 'login.php';</script>";
				        }

							?>
					<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="setting.php">设置</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">退出</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
	<div class="panel panel-success">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><i class="fa fa-book"></i>文章列表</div>
	  <div class="panel-body">
	    <p>点击标题查看文章详情</p>
	  </div>

	  <!-- List group -->
	  <ul class="list-group">

			<?php
				//连接数据库
				include "connMysql.php";


				$sql = "select * from t_blog order by add_time desc";

				//数据库进行查询 返回资源类型
				$query = mysqli_query($db, $sql);



				while( $result = mysqli_fetch_array($query) ){
			?>
				<li class="list-group-item"><a href="blog_detail.php?blog_id=<?php echo $result['blog_id'] ?>"><h3><i class="fa fa-star"></i> <?php echo $result['blog_title'] ?></h3></a>
					<div>
						<span><i class="fa fa-user"></i> <?php echo $result['blog_author'] ?> </span><span><i class="fa fa-calendar"></i> <?php echo $result['add_time'] ?> </span>
					</div>
				</li>
			<?php
				}
			?>






	  </ul>
	</div>

</div>








	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
