<?php

if(isset($_POST['com-btn'])){
  $com_connet = $_POST['editor'];
  //$comment_author = $_POST['comment_author'];
  $comment_author = $_COOKIE['username'];
  $blog_id = $_POST['blog_id'];

  //连接数据库
  include "connMysql.php";


  $sql = "insert into t_comment (comment_author,comment_content,blog_id)
      values('$comment_author','$com_connet','$blog_id')";
      //echo $sql;

  //数据库进行查询 返回资源类型
  $query = mysqli_query($db, $sql);
  if($query){
    //header('Location: blog_detail.php?blog_id='.$blog_id);
    //exit;
    echo "<script>location.href='blog_detail.php?blog_id='+$blog_id</script>";
  }

}


?>
