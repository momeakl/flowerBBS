<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
header("Content-type: text/html; charset=utf-8"); 
  /**********************************/
  /*	   文件名：add_user.php		*/
  /*	   功能：添加注册用户记录	*/
  /**********************************/
  require('../config.inc.php');

  //取得提交的数据，并做清理
  include ('../includes/header.inc.php');
  //用户名
  $username	= ClearSpecialChars($_POST['username']);
  //密码
  $password	= $_POST['password'];
  //电子邮件地址
  $email		= ClearSpecialChars($_POST['email']);
  //真实姓名
  $realname	= ClearSpecialChars($_POST['realname']);

  //检验数据的合法性
  if (!$username) { 
	ExitMessage('请输入用户名！'); 
  }
  if (!$password) { 
 	ExitMessage('请输入密码！'); 
  }
  if (!$email) { 
	ExitMessage('请输入电子邮件地址！'); 
  }
  elseif(!checkEmail($email)){
	ExitMessage('电子邮件地址格式错误！'); 
  }

  //对密码进行MD5加密
  $password=$_POST['password'];

  //判断用户是否已经存在
  $sql = "SELECT * FROM forum_user WHERE username='$username'";
  $result = mysql_query($sql);
  $num_rows = mysql_num_rows($result);

  if ($num_rows > 0) {
	ExitMessage('<p class="error">该用户已经存在！点击返回重新注册</p>');
  }

  //创建用户
  $sql = "INSERT INTO forum_user (username, password, email, realname, regdate)
		VALUES('$username', '$password', '$email', '$realname', NOW())";
  $result = mysql_query($sql);
  
  if($result)
  {
	?>
	<div class="addUser">
	<h2>创建用户</h2>

	<p>您的用户账号已经建立，请点击<a href="logon_form.php">这里</a>登录。</p>
    </div>
	<?php
  }
  else {
	ExitMessage("数据库错误！");
  }
?>
