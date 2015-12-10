<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
header("Content-type: text/html; charset=utf-8"); 
  /**************************************/
  /*		文件名：update_profile.php	*/
  /*		功能：用户资料修改页面		*/
  /**************************************/

  require('../config.inc.php');
  include ('../includes/header.inc.php');
  if (!$_SESSION['username']) {
	ExitMessage("请<b>登录</b>后执行该请求。", "logon_form.php");
  }

  //用户名
  $username=$_SESSION['username'];
  //电子邮件
  $email=$_POST['email'];
  //真实姓名
  $realname=$_POST['realname'];
  //用户密码
  $password=$_POST['password'];

  if (!$password) 
  {
	//如果密码为空，则密码项不予更新
	$sql="UPDATE forum_user 
			SET email = '$email', 
			realname = '$realname' 
		  WHERE username = '$username'";
  } else {
	//如果输入了新的密码，则密码项也予以更新
	$password = $password;
	$sql="UPDATE forum_user 
			SET password = '$password', 
			email = '$email', 
			realname = '$realname' 
		  WHERE username = '$username'";
  }

  $result=mysql_query($sql);

  if($result){
?>
<div class="updateUser">
<h2>个人资料更新成功</h2>

<p>
	您的个人资料已经被成功更新。 
	请<a href="main_forum.php">返回</a>论坛主页。
</p>
</div>

<?php
  }
  else {
	ExitMessage("记录不存在！");
  }
include ('../includes/footer.inc.php');
?>
