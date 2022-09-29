<?php
  session_start();
  unset($_SESSION["username"]);//释放username Session变量
  session_destroy();//销毁对话中的全部数据
  header('location:../Index.php');//回到主页
?>