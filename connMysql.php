

<?php
	
	//打开一个mysql数据库连接
	
	//@打开一个到 MySQL 服务器的新的连接
    $db = mysqli_connect("localhost","root","");

    if (!$db)
    {// 检测是否连接成功
        die("连接MySQL数据库失败! <br/>错误代码: " . mysqli_connect_errno());
    }


    //@更改连接的默认数据库,选择 MySQL php 数据库
    mysqli_select_db($db,"php");

    //@设置默认客户端字符集
    mysqli_set_charset($db,"utf8");


	