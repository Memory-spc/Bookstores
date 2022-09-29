<?php
  // 用户单击登录按钮后返回登录页面，判断登录是否成功
  if(isset($_POST['btnSubmit'])){
    // 用户输入的学号
    $username = $_POST['username'];
    // 用户输入的学号
    $password = $_POST['password'];
    // 引用数据库连接
    require_once 'public/Conn.php';
    // 定义SQL语句
    $sql = "SELECT * FROM account WHERE Username = '$username' AND Password = '$password'";
    // 执行查询
    $result = $db->query($sql);
    // var_dump($result);
    // 登录成功
    if($result->num_rows>=1){
      // 默认返回页面为主页
      $backUrl = 'Index.php';
      // 若页面接收到page参数，则跳转到对应的页面
      if(isset($_GET['page'])){
        $backUrl = $_GET['page'].'.php';
        echo '<script>alert("hhhhh");</script>';
      }
      session_start();//开启会话
      $_SESSION['username'] = $_POST['username'];
      // 页面跳转
      echo "<script>window.location = '".$backUrl."';</script>";
    }else{
      echo '<script>alert("用户名或密码错误");history.go(-1);</script>';
    }
    $result->close();
    $db->close();

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>网上书店</title>
</head>
<body>
  <?php
    include 'public/HeaderNav.php'
  ?>
  <div class="Login-container">
    <h3 style='margin-top:10rem;'>用户登录</h3>
    <form action="Login.php" method='POST' id="Login">
      <p><label>用户名：</label><label><input type="text" name="username"></label></p>
      <p><label>密码：</label><label><input type="password" name="password"></label></p>
      <p class="btn"><input type="submit" value="登录" name="btnSubmit"></p>
    </form>
  </div>
  <?php
    include 'public/Footer.html';
  ?>
</body>
</html>
<?php
?>