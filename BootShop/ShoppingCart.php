<?php
  session_start();
?>
<?php
  if(isset($_GET['name'])){
    require_once 'public/Conn.php';
    $sql = "UPDATE `cart` SET `Quantity`= '".$_GET['quantity']."' WHERE `Name`= '".$_GET['name']."'";
    $update = $db->query($sql);
    echo "<script>window.location='ShoppingCart.php'</script>";
  }
?>
<?php
  if(!isset($_SESSION['username'])){
    echo '<script>window.location = "Login.php?page=ShoppingCart";</script>';
  }else{
    if(isset($_GET['Delete'])){
      require_once "public/Conn.php";
      $sql = "DELETE FROM `cart` WHERE ProductId='".$_GET['Delete']."'";
      $delete = $db->query($sql);
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
  <div class="ShoppingCart-container">
    <div class='table'>
        <ul>
          <li>书籍名称</li>
          <li>数量</li>
          <li>单价</li>
          <li>删除</li>
        </ul>
        <?php
          require_once 'public/Conn.php';
          $sql = "SELECT cart.Name,cart.Quantity,cart.ProductId,product.ListPrice FROM cart INNER JOIN product on cart.ProductId=product.ProductId WHERE Username='".$_SESSION['username']."'";
          $result = $db->query($sql);
          while($row = $result->fetch_assoc()){
            echo "<ul><li>".$row['Name'].
                  "</li><li><input name='quantity' type='number' value='".$row['Quantity']."'>".
                  "</li><li>".$row['ListPrice'].
                  "</li><li><a href='ShoppingCart.php?Delete=".$row['ProductId']."'>删除</a>".
                  "</li></ul>";
          }
        ?>
    </div>
    <div class="settlement">
      <ul>
        <li style="width: 30%;"><a href="Products.php">继续选购</a></li>
        <li style="width: 30%;">总价:&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
          $sql = "SELECT cart.Quantity,product.ListPrice FROM cart INNER JOIN product on cart.ProductId=product.ProductId WHERE Username='".$_SESSION['username']."'";
          $total = $db->query($sql);
          // var_dump($total->num_rows);
          $totalPrice = 0;
          while($row = $total->fetch_assoc()){
            $totalPrice = $totalPrice + $row['Quantity']*$row['ListPrice'];
          }
          echo $totalPrice;
        ?>&nbsp;&nbsp;元
      </li>
        <li><a href="CheckOut.php">结算</a></li>
      </ul>
    </div>
  </div>
  <?php
    include 'public/Footer.html'
  ?>
</body>
</html>