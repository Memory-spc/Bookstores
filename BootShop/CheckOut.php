<?php
  session_start();
  require_once "public/Conn.php";
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
  <div class="CheckOut-container">
    <?php
      if(isset($_GET['Check'])){
        $sql = "SELECT Province,City,Address,Phone FROM account WHERE Username='".$_SESSION['username']."'";
        $row = $db->query($sql)->fetch_assoc();
        if($row['Province']==null && $row['City'] == null && $row['Address'] == null){
          echo "<script>window.alert('请填写完整的收货地址')</script>";
          echo "<script>window.location='Userprofile.php';</script>";
          exit();
        }
        else if($row['Phone']){
          echo "<script>window.alert('请填写收货人电话')</script>";
          echo "<script>window.location='Userprofile.php';</script>";
          exit();
        }else{
          $sql = "DELETE FROM `cart` WHERE Username='".$_SESSION['username']."'";
          $delete = $db->query(($sql));
          // var_dump($delete);
  
          echo "<p>";
          echo "订单提交成功，感谢您的订购<br>";
          echo "订单商品即将开始配送，请保持您的联系方式通畅<br>";
          echo "如对本订单有任何疑问，请联系我们的客服40000000000<br>";
          echo "网上书城团队<a href='Products.php'>继续选购</a><br>";
          echo "</p>";
        }
      }else{
        echo '<div class="products">';
        echo '<ul><li>书籍名称</li><li>数量</li><li>单价</li></ul>';
        $sql = "SELECT cart.Name,cart.Quantity,product.ListPrice FROM cart INNER JOIN product on cart.ProductId=product.ProductId WHERE Username='".$_SESSION['username']."'";
        $result = $db->query($sql);
        // var_dump($result);
        while($row = $result->fetch_assoc()){
          echo "<ul><li>".$row['Name'].
            "</li><li>".$row['Quantity'].
            "</li><li>".$row['ListPrice'].
            "</li></ul>";
        }
        echo '</div>';

        echo '<div class="userProfile">';
        echo '<ul><li style="width: 10%;">总价</li><li style="width: 10%;">收货人</li><li style="width: 20%;">收货人电话</li><li  style="width: 50%;">收货地址</li><li style="width:10%;"></li></ul>';
        echo '<ul><li>';

        $sql = "SELECT cart.Quantity,product.ListPrice FROM cart INNER JOIN product on cart.ProductId=product.ProductId WHERE Username='".$_SESSION['username']."'";
        $total = $db->query($sql);
        $totalPrice = 0;
        while($row = $total->fetch_assoc()){
          $totalPrice = $totalPrice + $row['Quantity']*$row['ListPrice'];
        }

        echo $totalPrice.'</li><li>';
        $sql = "SELECT Cname,Province,City,Address,Phone FROM account WHERE Username='".$_SESSION['username']."'";
        $row = $db->query($sql)->fetch_assoc();
        if($row['Cname'] == NULL){
          echo $_SESSION['username'].'</li><li>';
        }else{
          echo $row['Cname'].'</li><li>';
        }
        echo $row['Phone'].'</li><li>';

        echo $row['Province'].$row['City'].$row['Address'].'</li>';

        echo '<li><a href="CheckOut.php?Check=true">提交订单</a></li></ul>';
      }
    ?>
    </div>
  </div>
  <?php
    include 'public/Footer.html';
  ?>
</body>
</html>