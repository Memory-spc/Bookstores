<?php
  session_start();
  if(!isset($_SESSION['username'])){
    echo '<script>window.location = "Login.php?page=UserProfile";</script>';
  }else{
    require_once "public/Conn.php";
    $sql = "SELECT * FROM `account` WHERE Username = '".$_SESSION['username']."'";
    $result = $db->query($sql);
    // var_dump($result);
    if($result = $db->query($sql)){
      if($row = $result->fetch_assoc()){
        $cname = $row['Cname'];
        $country = $row['Country'];
        $province = $row['Province'];
        $city = $row['City'];
        $address = $row['Address'];
        $zip = $row['Zip'];
        $phone = $row['Phone'];
        $email = $row['Email'];
      }
    }
  }
?>
<?php
  if(isset($_POST['btnSubmit'])){
    if(isset($_POST['cname'])){
      $cname = $_POST['cname'];
    }
    if(isset($_POST['country'])){
      $country = $_POST['country'];
    }
    if(isset($_POST['province'])){
      $province = $_POST['province'];
    }
    if(isset($_POST['city'])){
      $city = $_POST['city'];
    }
    if(isset($_POST['address'])){
      $address = $_POST['address'];
    }
    if(isset($_POST['zip'])){
      $zip = $_POST['zip'];
    }
    if(isset($_POST['phone'])){
      $phone = $_POST['phone'];
    }
    if(isset($_POST['email'])){
      $email = $_POST['email'];
    }
    $sql = "UPDATE `account` SET `Cname`='".$cname."',`Country`='".$country."',`Province`='".$province."',`City`='".$city."',`Address`='".$address."',`Zip`='".$zip."',`Phone`='".$phone."',`Email`='".$email."' WHERE Username = '".$_SESSION["username"]."'";
    $result = $db->query($sql);
    // var_dump($result);
    // $result->close();
    // $db->close();
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
  <div class="Userprofile-container">
    <h3>用户注册</h3>
    <form action="UserProfile.php" method="post" enctype="multipart/form-data" id="UserProfile">
      <ul>
        <li>姓名:</li>
        <li><input type="text" name="cname" value="<?=$cname?>"></li>
      </ul>
      <ul>
        <li>国家:</li>
        <li><input type="text" name="country" value="<?=$country?>"></li>
      </ul>
      <ul>
        <li>省份:</li>
        <li><input type="text" name="province" value="<?=$province ?>"></li>
      </ul>
      <ul>
        <li>城市:</li>
        <li><input type="text" name="city" value="<?=$city ?>"></li>
      </ul>
      <ul>
        <li>地址:</li>
        <li><input type="text" name="address" value="<?=$address ?>"></li>
      </ul>
      <ul>
        <li>邮编:</li>
        <li><input type="text" name="zip" value="<?=$zip ?>"></li>
      </ul>
      <ul>
        <li>手机:</li>
        <li><input type="text" name="phone" value="<?=$phone ?>"></li>
      </ul>
      <ul>
        <li>邮箱:</li>
        <li><input type="text" name="email" value="<?= $email?>"></li>
      </ul>
      <ul>
        <li class="btn"><input type="submit" value="保存" name="btnSubmit"></li>
      </ul>
    </form>
  </div>
  <?php
    include 'public/Footer.html'
  ?>
</body>
</html>