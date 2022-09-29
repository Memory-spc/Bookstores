<?php
  $db=new mysqli('localhost','root','','bookshop');
  if($db->connect_errno){
    echo ("数据库连接失败");
  }
  // 设置字符集，避免中文乱码
  $db->query("SET NAMES utf8");
?>