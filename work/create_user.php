<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
header("Content-type: text/html; charset=utf-8"); 
  /**************************************/
  /*		文件名：create_user.php		*/
  /*		功能：生成用户注册页面		*/
  /**************************************/

  require('../config.inc.php');
  include('../includes/header.inc.php');
?>
<div class="createUser">
<h2>注册</h2>

<fieldset style="background:url(../images/header-background2.png) left" >
<legend>Register</legend>
<form id="Register" method="post" action="add_user.php">
<table width="800" >
  <tr>
	<td width="100" ><label for="username">用户名:</label></td>
	<td><input name="username" type="text"></td>
    <td width="400"><p class="msg"><i class="ati"></i>请输入6-26个字符长度</p></td>
  </tr>
  <tr>
    <td width="100"><label for="password">密 码:</label></td>
    <td><input name="password" type="password"></td>
      <td width="400"><p class="msg">密码长度不大于16，使用组合字符数字等等</p></td>
  </tr>
  <tr>
    <td width="100"><label for="password">确认密码:</label></td>
    <td><input name="password" type="password" disabled=""></td>
      <td width="400"><p class="msg">两次密码应当一致</p></td>
  </tr>
  <tr>
    <td width="100"><label for="email">E-mail:</label></td>
    <td><input name="email" type="text"></td>
      <td width="400"><p class="msg"><i class="ati"></i>请输入6-26个字符长度</p></td>
  </tr>
  <tr>
    <td width="100"><label for="realname">真实姓名:</label></td>
    <td><input name="realname" type="text"></td>
      <td width="400"><p class="msg">昵称应当唯一</p></td>
  </tr>
</table>
<section class="button">
<input type="submit" name="Submit" value="提交注册" class="button"/>
<input type="reset" name="Submit2" value="清空" class="button"/>
</section>
</form>
</fieldset>
</div>
<?php 

	//公用尾部页面
	include('../includes/footerRegis.inc.php');
?>
