<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
header("Content-type: text/html; charset=utf-8"); 
  /**************************************/
  /*		文件名：add_reply.php		*/
  /*		功能：回复文章保存页面		*/
  /***************************************/

  require('../config.inc.php');

  //判断用户是否登录
  if (!$_SESSION['username']) 
  {
    
	/*ExitMessage("请<b>登录</b>后执行该请求。", "logon_form.php");*/
  }

  //回帖的ID
  $id=$_POST['id'];

  //验证帖子已经存在，未被锁定
  $sql = "SELECT * from forum_topic WHERE id='$id'";
  $result = mysql_query($sql);
  $topic_info = mysql_fetch_array($result);

  if (!$topic_info)
  {
	ExitMessage("帖子记录不存在！", "main_forum.php");
  }


  //取得用户信息
  $username = $_SESSION['username'];
  $sql = "SELECT * from forum_user WHERE username='$username'";
  $result = mysql_query($sql);
  $user_info = mysql_fetch_array($result);

  //取得提交过来的数据
  $reply_name=$_SESSION['username'];
  $reply_email=$user_info['email'];
  $reply_detail=$_POST['reply_detail']; 

  if (!$reply_detail)
  {
    include('../includes/header.inc.php');
	ExitMessage("没有回贴记录！", "main_forum.php");
  }

  //取得reply_id的最大值
  $sql = "SELECT Count(reply_id) AS MaxReplyId 
		FROM forum_reply WHERE topic_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_row($result);

  //将reply_id最大值+1，如果没有该值，则设置为1。
  if ($rows)
  {
	$Max_id = $rows[0]+1;
  }
  else {
	$Max_id = 1;
  }

  //插入回复数据
  $sql="INSERT INTO forum_reply (topic_id, reply_id, reply_name, 
		reply_email, reply_detail, reply_datetime)
		VALUES('$id', '$Max_id', '$reply_name', 
		'$reply_email', '$reply_detail', NOW())";
  $result=mysql_query($sql);

  if($result)
  {
	//更新reply字段
	$sql="UPDATE forum_topic SET reply='$Max_id' WHERE id='$id'";
	$result=mysql_query($sql);

	//页面跳转
	header("Location: view_topic.php?id=$id");
  }
  else {
	ExitMessage("记录不存在");
  }

?>
