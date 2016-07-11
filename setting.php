<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>profile setting</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <style>
    .center{
      text-align: center;
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
        <li><a href="#">博文详情 </a></li>
				<li><a href="#">联系我</a></li>
				<li class="active"><a href="setting.php">关于我<span class="sr-only">(current)</span></a></li>

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
            <li><a href="#">设置</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">退出</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-9">
    <?php
      $user_id = $_COOKIE["id"];
      //根据id查询个人信息
      //连接数据库
        include "connMysql.php";


        $sql = "select * from t_user where id = '$user_id'";
        //echo $sql;

        //数据库进行查询 返回资源类型
        $query = mysqli_query($db, $sql);
        $result = mysqli_fetch_array($query);
        //var_dump($result);
    ?>
      <div class="panel panel-info">
          <!-- Default panel contents -->
          <div class="panel-heading"><i class="fa fa-book"></i>设置个人信息</div>
          <div class="panel-body">
            <p>点击输入框进行修改</p>
            <form action="update.php" method="post">
              <div class="form-group">
                <label for="username">用 户 名</label>
                <input value="<?php echo $result['username'] ;?>" name="username" type="text" class="form-control" id="username" >
              </div>
              <div class="form-group">
                <label for="password">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
                <input value="<?php echo $result['password'] ;?>" name="password" type="password" class="form-control" id="password" >
              </div>
               <div class="form-group">
                <label for="password">个人签名</label>
                <input value="<?php echo $result['sign'] ;?>" name="sign" type="text" class="form-control" id="sign" >
              </div>
              <input type="hidden" name="user_id" value="<?php echo $result['id'] ;?>">
              <button name="update-btn" class="btn btn-primary" type="submit">保存修改</button>
              <button class="btn btn-default" type="reset">放弃修改</button>
            </form>
          </div>
          <div class="panel-footer">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore consectetur optio eaque vel magni asperiores, eligendi sit nihil, suscipit aliquam incidunt cupiditate repellat aut quia dolores dicta soluta dolore mollitia.</p>
          </div>   
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-success">
          <!-- Default panel contents -->
          <div class="panel-heading"><i class="fa fa-book"></i>profile</div>
          <div class="panel-body">
            <p>someone like u </p>
          </div>

          
          <div class="thumbnail">
            <img class="img img-circle img-thumbnail" src="img/avatar.jpg">
            <div class="caption">
            
            
            
            <h3 class="name bg-info text-success center"><?php echo $_COOKIE['username'] ;?></h3>
            <p class="desc text-info center">
              <?php 
                if ($_COOKIE['sign'] == ""){
                  echo "这家伙很懒，啥都没留下！";
                }else{
                  echo $_COOKIE['sign'] ;
                }
                
              ?>
              
            </p>
            
        </div>
      </div>
    </div>   
  </div>
</div>




<script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
