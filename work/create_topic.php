<?php
header("Content-type: text/html; charset=utf-8"); 
ini_set("error_reporting","E_ALL & ~E_NOTICE");
  /***********************************/
  /*      文件名：create_topic.php   */
  /*      功能：发表文章页面		 */
  /***********************************/

  require('../config.inc.php');
  include('../includes/header.inc.php'); 
?>



<?php 
  if (!$_SESSION['username'])
  { 
	  //如果用户未登录，显示错误信息
?>
<div class="noregister">
<h3>您未登陆,没有发帖权限</h3>
<p>对不起，请<a href="create_user.php">注册</a>新用户，
	或者进行<a href="logon_form.php">登录</a>。
</p>
</div>
<?php
  }else{ 
	//如果用户登录，显示输入表单
?>
<div class="createTopic">
<section class="one">
<h2>The requirement of the new post: </h2>
<ul>
	<li>话题和正文都是必填项。</li>
	<li>最好别掺入HTML代码。</li>
	<li>Thanksgiving life, cherish the owns 。</li>
</ul>
</section>
<section class="two" >
<form method="post" action="add_topic.php" id="postComment">
<table>
  <tr>
	<td class="text" style="margin-right:40px;">话题</td>
	<td><input name="topic" type="text" id="topic" size="50"><td>
  </tr>
  <tr>
    <td class="text">正文</td>
    <td><textarea name="detail" cols="55" rows="15" id="detail"></textarea></td>
  </tr>
</table>

<?php
  //如果是管理员，将显示“置顶”和“锁定”功能
  if ($_SESSION['username'] == ADMIN_USER)
  {
?>
    <br/><p class="stick">置顶按钮: </p><div class="checkboxFour" ><input type="checkbox" id="checkboxFourInput" name="sticky" value="on"><label for="checkboxFourInput"></label></div>
<?php
  }
?>

<br><br>
<section class="submit">
<input type="submit" name="Submit" value="立即发布" class="button">
    <input type="reset" name="Submit2" class="button"></section>
</form>
    </section>
</div>
<?php } ?>

<?php 
	//公用尾部页面
	include('../includes/footer.inc.php'); 
?>
