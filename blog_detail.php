<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>detail</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">


  <link rel="stylesheet" href="css/editor.css">
  <style>
    .CodeMirror{
      height: 100px;
    }
  </style>

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
        <li><a href="index.php">首页</a></li>
        <li class="active"><a href="#">博文详情 <span class="sr-only">(current)</span></a></li>
				<li><a href="#">联系我</a></li>
				<li><a href="setting.php">关于我</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-tag"></i> <?php echo $_COOKIE['sign'] ?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            <?php

						//session_start();
						$username = $_COOKIE['username'];
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
<?php
  if(isset($_GET['blog_id'])){

    $blog_id = $_GET['blog_id'];

    //连接数据库
    include "connMysql.php";


    $sql = "select * from t_blog where blog_id = '$blog_id' ";

    //数据库进行查询 返回资源类型
    $query = mysqli_query($db, $sql);


    //将资源类型转换成数组类型
    $result = mysqli_fetch_array($query);

    //var_dump($result);

  }



?>

<div class="container">
	<div class="panel panel-info">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><h3><i class="fa fa-book"></i><?php echo $result['blog_title'] ?></h3></div>
	  <div class="panel-body">
	    <?php echo $result['blog_content'] ?>
	  </div>
    <div class="panel-footer">

        <span><i class="fa fa-user"></i> <?php echo $result['blog_author'] ?> </span><span><i class="fa fa-calendar"></i> <?php echo $result['add_time'] ?> </span>

    </div>
	</div>

  <div class="panel panel-warning">
    <!-- Default panel contents -->
    <div class="panel-heading"><i class="fa fa-book"></i>回复</div>
    <ul class="list-group">

  <?php


      $blog_id = $_GET['blog_id'];

      //连接数据库
      include "connMysql.php";


      $sql = "select * from t_comment where blog_id = '$blog_id' order by add_time desc";

      //数据库进行查询 返回资源类型
      $query = mysqli_query($db, $sql);


      //将资源类型转换成数组类型
      //$result = mysqli_fetch_array($query);

      //var_dump($result);
      while( $result = mysqli_fetch_array($query)){

  ?>

        <li class="list-group-item">
          <div>
            <span><i class="fa fa-user"></i> 评论者：<?php echo $result['comment_author'] ?> </span>
            <span><i class="fa fa-calendar"></i> 评论时间： <?php echo $result['add_time'] ?> </span>
          </div>
          <p>
            <?php echo $result['comment_content'] ?>

          </p>
        </li>



  <?php
    }
  ?>
  </ul>
  </div>



  <div class="panel panel-danger">
	  <!-- Default panel contents -->
	  <div class="panel-heading"><h4><i class="fa fa-book"></i>发表评论</h4></div>
    <div class="panel-body">
      <form class="" action="add_com.php" method="post">
        <textarea class="editor" name="editor" id="editor" ></textarea>
        <input type="hidden" name="comment_author" value="<?php echo $_COOKIE['username']  ?>">
        <input type="hidden" name="blog_id" value="<?php echo $_GET['blog_id']  ?>">
      	<button type="submit" name="com-btn" class="btn btn-primary">回复</button>
      </form>
  	</div>

	</div>



</div>










	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

  <script src="js/editor.js"></script>
  <script src="js/marked.js"></script>
	<script>
  	$(function () {
    		$('[data-toggle="tooltip"]').tooltip()
  	});

  	$(function () {
    		$('[data-toggle="popover"]').popover()
  	});
  	var editor = new Editor();
  	editor.render();

  	</script>
</body>
</html>
