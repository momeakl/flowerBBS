<?php
  /**************************************/
  /*		文件名：logoff_user.php		*/
  /*		功能：用户退出程序			*/
  /**************************************/

  require('../config.inc.php');
  //清空SESSION
  $_SESSION = array();
  session_unset();

  //清空SESSION
  session_destroy();

  //跳转页面
  header("Location: main_forum.php");
?>
