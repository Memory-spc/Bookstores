<?php
  session_start()
?>
<?php
  // 处理用户提交的原始数据
  function checkInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if(isset($_POST['btnSubmit'])){
    // 包含数据库连接文件
    require_once 'public/Conn.php';
    $username = $_POST['username'];
    $sql = "SELECT Username FROM account WHERE Username = '".$username."'";
    $result = $db->query($sql);
    // var_dump($result);
    if($result->num_rows>=1){
      echo "<script>alert('该用户名已存在');document.getElementsByName.value = '';</script>";
    }else{
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      $phone = $_POST['phone'];
      $sql = "INSERT INTO account VALUES ('".$username."', '".$password."', NULL, NULL, NULL, NULL, NULL, NULL, '".$phone."', NULL)";
      $result = $db->query($sql);
      echo "<script>alert('注册成功');</script>";
      // var_dump($result);
    }
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
  <div class="Register-container">
    <h3>用户注册</h3>
    <form action="Register.php" method="post" enctype="multipart/form-data" id="Register">
      <ul>
        <li style="width: 30%;">用户名:</li>
        <li style="width: 70%;"><input type="text" name="username"></li>
      </ul>
      <ul>
        <li>密码:</li>
        <li><input type="password" name="password" id="password"></li>
      </ul>
      <ul>
        <li>确认密码:</li>
        <li><input type="password" name="confirm_password"></li>
      </ul>
      <ul>
        <li>手机:</li>
        <li><input type="text" name="phone"><label class="error"></label></li>
      </ul>
      <ul>
        <li class="btn"><input type="submit" value="注册" name="btnSubmit"></li>
      </ul>
      <!-- <ul>
        <li>国家:</li>
        <li><input type="text" name="country"></li>
      </ul>
      <ul>
        <li>省份:</li>
        <li><input type="text" name="province"></li>
      </ul>
      <ul>
        <li>城市:</li>
        <li><input type="text" name="city"></li>
      </ul>
      <ul>
        <li>地址:</li>
        <li><input type="text" name="address"></li>
      </ul>
      <ul>
        <li>邮编:</li>
        <li><input type="text" name="zip" name="zip"></li>
      </ul>
      <ul>
        <li>手机:</li>
        <li><input type="text" name="phone"></li>
      </ul>
      <ul>
        <li>邮箱:</li>
        <li><input type="text" name="email"></li>
      </ul> -->
    </form>
  </div>
  <?php
    include 'public/Footer.html'
  ?>
</body>
</html>