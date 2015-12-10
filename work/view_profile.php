<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
header("Content-type: text/html; charset=utf-8"); 
  /**************************************/
  /*		文件名：view_profile.php	*/
  /*		功能：查看用户资料页面		*/
  /**************************************/
  require('../config.inc.php');

  //取得用户ID
  $id=$_GET['id'];

  //取得用户信息
  $sql="SELECT * FROM forum_user WHERE username='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);

  if (!$rows){
	ExitMessage("用户记录不存在！", "index.php");
  }

  //正文内容
  $sql = "SELECT * FROM forum_topic WHERE name = '" . $id . "'";
  $count_q = mysql_query($sql);
  $num_count_q = mysql_num_rows($count_q);

  //回复内容
  $sql = "SELECT * FROM forum_reply WHERE reply_name = '" . $id . "'";
  $count_a = mysql_query($sql);
  $num_count_a = mysql_num_rows($count_a);

  //计算用户发表的帖子数量
  $num_count = $num_count_q + $num_count_a;
?>

<?php include('../includes/header.inc.php'); ?>
<div class="user_info">
<h2>查看 <b><?php echo $rows['username']; ?></b> 个人资料:</h2>

<?php
	//改写电子邮件地址
	$mail=$rows['email'];
//	$mail=str_replace("@", " [at] ", $mail);
//	$mail=str_replace(".", " [dot] ", $mail);
?>

<fieldset>
	<legend>个人资料</legend>
<br>
<table width="300">
  <tr>
    <td width="100"><strong>真实姓名:</strong></td>
    <td width="200"><?php echo $rows['realname']; ?></td>
  </tr>
  <tr>
    <td><strong>电子邮件:</strong></td>
    <td><?php echo $mail; ?></td>
  </tr>
  <tr>
    <td><strong>发贴数量:</strong></td>
    <td><?php echo $num_count; ?></td>
  </tr>
</table>
<br>
<input type="button" value="返回首页" onclick="location.href='main_forum.php'">
</fieldset>
</div>
<?php include('../includes/footer.inc.php'); ?>
