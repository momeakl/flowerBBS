<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
header("Content-type: text/html; charset=utf-8"); 
  /**************************************/
  /*		文件名：view_topic.php		*/
  /*		功能：文章详细页面			*/
  /**************************************/

  require('../config.inc.php');

  //根据ID取得贴子记录
  $id=$_GET['id'];
  $sql="SELECT * FROM forum_topic WHERE id='$id'";

  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);

  //记录不存在
  if (!$rows) 
  {
	ExitMessage("该贴记录不存在！", "main_forum.php");
  }

  //置顶标记
  $sticky=$rows['sticky'];

?>
        
<?php include('../includes/header.inc.php'); ?>
<img id="x" src="../images/backspace.png" alt="backspace">
<div class="setTopic">
<h2 style="text-align:center;"><?php echo '主题：'.$rows['topic']; ?></h2>
<p class="info">
	由用户<a href="view_profile.php?id=<?php echo $rows['name']; ?>">
	<?php echo $rows['name']; ?></a> 于 <?php echo $rows['datetime']; ?>
	创建
</p>
</div>
<div class="detial">
<!--<img src="../images/ball4.png" alt="tuding">大头针不好看-->
<p class="article">
<?php
	//输出整理好的内容
	echo nl2br(htmlspecialchars($rows['detail']));
?>
</p>
<div class="user">
    <p>创建于<?php echo $rows['datetime']; ?></p>
</div>


</div>
<dl>
<div class=result><p><?php

  //获取回复内容
  $sql	="SELECT * FROM forum_reply WHERE topic_id='$id'";

  $result	= mysql_query($sql);
  $num_rows = mysql_num_rows($result);

  if ($num_rows)
  {
	//循环取出记录内容
	while($rows=mysql_fetch_array($result))
	{
?>
<section class="reply">
 <dt>
    <a href="view_profile.php?id=<?php echo $rows['reply_name']; ?>">
    	<?php echo '用户'.$rows['reply_name']; ?>
    </a>
     - <?php echo $rows['reply_datetime']; ?>
 </dt>
 <dd>
  <p><?php
    	//输出整理好的内容
    	echo nl2br(htmlspecialchars($rows['reply_detail'])); 
     ?></p>
 </dd>
</section>
 
 <?php
	}//结束循环
  }else{
	echo "暂无回复!";
  }
 
  //浏览量加1
  $sql = "UPDATE forum_topic set view=view+1 WHERE id='$id'";
  $result = mysql_query($sql);

    ?></p></div>
</dl>

<!--内容回复表单，开始-->


<div class="replyText"><?php 
//判断用户是否已经注册
if (!$_SESSION['username'])
{
	echo '<p class="noregist">请先<a href="create_user.php">注册</a>，
		  或者<a href="logon_form.php">登录</a>后进行评论。</p>';
} else {

	
?>
<form name="form1" method="post" action="add_reply.php" id="reply">
 <input name="id" type="hidden" value="<?php echo $id; ?>">
 <table class="reply">
  <tr>
   <td valign="top">发表<br>回帖</td>
   <td>
    <textarea class="coolscrollbar" name="reply_detail" cols="80" rows="5"></textarea>
   </td>
  </tr>
  <tr>
   <td valign="top">&nbsp;</td>

  </tr>
 </table>
 <br />
 <section class="button">
 <input type="submit" name="Submit" value="回复该帖" class="button" />
 </section>
</form>
<?php } ?></div>
<br>
<!--内容回复表单，结束-->

<?php 
  //如果是管理员用户，则输出“置顶”、“锁定”和“删除”按钮
  if ($_SESSION['username'] == ADMIN_USER)
  { 
?>
<!--管理员操作表单，开始-->
<div id="admin">
<p>管理员操作</p>


  <!--显示置顶操作按钮-->
  <?php if ($sticky == 0) { ?>
	<form name="stick" method="post" action="stick_topic.php">
	 <input type="hidden" name="id" value="<?php echo $id; ?>">
	 <input type="submit" name="Submit" value="置顶该贴" class="button">
	 将该贴置于顶端
	</form>
  <?php } else { ?>
	<form name="unstick" method="post" action="unstick_topic.php">
	 <input type="hidden" name="id" value="<?php echo $id; ?>">
	 <input type="submit" name="Submit" value="取消置顶" class="button">
	 取消该贴置顶
	</form>
  <?php } ?>
  
  <!--显示删除操作按钮-->
  <form name="delete" method="get" action="del_topic.php">
	 <input type="hidden" name="id" value="<?php echo $id; ?>">
	 <input type="submit" name="Submit" value="删除帖子" class="button">
	 删除该帖与回复内容
  </form>
</div>
<!--管理员操作表单，结束-->
<?php 
	} 

?>

<?php include('../includes/footerBack.inc.php'); ?>
