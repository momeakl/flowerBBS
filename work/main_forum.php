<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Content-type: text/html; charset=utf-8"); 
  /**************************************/
  /*		文件名：main_forum.php		*/
  /*		功能：论坛主页面			*/
  /**************************************/

  require('../config.inc.php');

  //取得当前页数
  
//  $page=$_GET['page'];
  $page=$_GET["page"];
 
  
  //每页最多显示的记录数
  $each_page = 8;

  //计算页面开始位置
  if(!$page || $page == 1)
  {
	$start = 0;
  }else{
	$offset = $page - 1;
	$start = ($offset * $each_page);
  }
?>

<?php include('../includes/header.inc.php'); ?>


<p>

<?php
  //检索记录，按照置顶标记和时间排序
  $sql = "SELECT * FROM forum_topic 
	    ORDER BY sticky DESC, datetime DESC LIMIT $start, $each_page";
  $result = mysql_query($sql);
?>
<div class="list">
<h2>主题列表</h2>
<table width="80%"  align="center" 
	cellpadding="3" cellspacing="0" >
<tr bgcolor="#cc9">
<td width="40%" align="center" style="border:0;">帖子</td>
<td width="8%" align="center" style="border:0;">访问</td>
<td width="8%" align="center" style="border:0;">回复</td>
<td width="24%" align="center" style="border:0;">发表日期</td>
</tr>

<?php
  //循环输出输出记录列表
  while($rows=mysql_fetch_array($result))
  { 
?>
<tr bgcolor="#ffc">
  <td class="topic">

<?php
	//如果是“置顶”的记录
	if ($rows['sticky'] == "1")
	{
	  ?><img src="../images/lamp.png" alt="置顶"><?php 
	}
  
	
?>
      <a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><section class="user"><?php echo 'By: '.$rows['name']?></section>
  </td>
  <td align="center">
	  <?php 
		echo $rows['view'];  //浏览量
	  ?>
  </td>
  <td align="center">
	  <?php 
		echo $rows['reply'];  //回复量
	  ?>
  </td>
  <td align="center">
	  <?php 
		echo $rows['datetime'];  //日期
	  ?>
  </td>
</tr>

<?php
  } //退出while循环
?>

</table>
</div>
<?php
  $prevpage = 0;
  //计算前一页
  if($page > 1)
  {
	$prevpage = $page - 1;
  }

  //当前记录
  $currentend = $start + EACH_PAGE;

  //取得所有的记录数
  $sql = "SELECT COUNT(*) FROM forum_topic";
  $result = mysql_query($sql);
  $row = mysql_fetch_row($result);
  $total = $row[0];
  $nextpage = 0;
  //计算后一页
  if($total>$currentend)
  {
	if(!$page){
		$nextpage = 2;
	}else{
		$nextpage = $page + 1;
	}
  }
?>

</p>

<p class="prevpage">

<?php

  //判断分页并输出
  if ($prevpage || $nextpage) 
  {
	//上一页
	if($prevpage)
	{
		echo "<a href=\"?page={$prevpage}\"><< 上一页</a> ";
	}else{
		echo "&nbsp";
	}

	//后一页
	if($nextpage)
	{
		echo "<a href=\"?page={$nextpage}\">下一页 >></a> ";
	}else{
		echo "&nbsp";
	}
  }
?>
<input type="button" onClick="location.href='create_topic.php'" value="创建新帖子">
</p>


<section class="message">
<h3>Prompt</h3>
<img src="../images/lamp.png" alt="Sticky" border="0" align="absmiddle"> 置顶的帖子<br>
</section>


<?php
  //公用尾部页面
  include('../includes/footer.inc.php') 
?>
