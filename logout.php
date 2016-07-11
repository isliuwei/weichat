<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>logout</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

</head>
<body>
<?php
  setcookie('id', "",time()-3600);
  setcookie('username', "",time()-3600);
  setcookie('sign', "",time()-3600);
  // setcookie('id', "");
  // setcookie('username', "");
?>

<div class="container">
  <div class="jumbotron">
    <h1>See you later!</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p><a class="btn btn-primary btn-lg" href="login.php" role="button">返回登录</a></p>
  </div>
</div>


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
