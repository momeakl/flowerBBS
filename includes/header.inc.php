<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>花の语论坛</title>
<link rel="stylesheet" href="../css/bbs.css">
<link rel="stylesheet" href="../css/style.css">

</head>

<body style="background:url(../images/moho2.jpg) no-repeat; ">

<!-- 头开始 -->
<div id="header">
<?php 
  //判断用户是否登录，从而显示不同的导航界面
  
  if(isset($_SESSION["username"])&&$_SESSION['username']) 
  { 
?>  
    <section class="title">
    <h1>花之语论坛</h1>
    <img src="../images/24.png" alt="lala">
    </section>
	<!-- 用户登录后的导航条 -->
	<nav id="menu">
	    <ul>
	        <p><?php echo '&nbsp;'.'user: '.$_SESSION['username']; ?></p> 
            <li><a href="../work/main_forum.php">首页</a> | </li>
            <li><a href="../work/edit_profile.php">个人资料</a> |</li>
            <li><a href="../work/logoff_user.php">退出登录</a></li>
            
        </ul>
    </nav>
<?php } else { ?> 
    <section class="title">
    <h1>花之语论坛</h1>
    <img src="../images/24.png" alt="lala">
    </section>
	<!-- 用户未登录的导航条 -->
	<nav id="menu2">
	    <ul>
        <li><a href="../work/main_forum.php">首页</a> | </li>
        <li><a href="../work/create_user.php">注册</a> | </li>
        <li><a href="../work/logon_form.php">登录</a></li>
        </ul>
	</nav>
<?php  
  }//判断结束
?>
	<br>
</div>

<!-- 头结束 -->

<!-- 正文内容开始 -->
<div id="Content">
