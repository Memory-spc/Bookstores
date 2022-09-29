<?php
  session_start();
  function SQLquery($db,$proId){
    $sql = "SELECT ProductId,Quantity,Name FROM cart WHERE Username = '".$_SESSION["username"]."' AND ProductId='".$proId."'";
    $result = $db->query($sql);
    // var_dump($result);
    if($result->num_rows >=1){
      $row = $result->fetch_assoc();
      $quantity = $row['Quantity'] + 1;
      $sql = "UPDATE cart set Quantity='".$quantity."' WHERE ProductId = '".$proId."'";
      $update = $db->query($sql);
      // var_dump($update);
    }else{
      $sql = "SELECT ProductId,Name,Listprice FROM product WHERE ProductId='".$proId."'";
      $result = $db->query($sql);
      // var_dump($result);
      $row = $result->fetch_assoc();
      $row['Name'].','.$row['Listprice'];
      $productid = $row['ProductId'];
      $name = $row['Name'];
      $listprice = $row['Listprice'];
      $sql = "INSERT INTO `cart` VALUES ('".$_SESSION['username']."','".$productid."','".$name."','".$listprice."',1)";
      $add = $db->query($sql);
      // var_dump($add);
    }
    echo "<script>window.location='Products.php'</script>";
  }
  if(isset($_SESSION['username'])){
    require_once "public/Conn.php";
    if(isset($_GET['bookName'])){
      switch($_GET['bookName']){
        case 'WhisperGoodBye':
          $proId = 1001;
          SQLquery($db,$proId);
          break;
        case 'MiracleSet':
          $proId = 1002;
          SQLquery($db,$proId);
          break;
        case 'NabokovShortStories':
          $proId = 1003;
          SQLquery($db,$proId);
          break;
        case 'SoulAlone':
          $proId = 1004;
          SQLquery($db,$proId);
          break;
      }
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
  <div class="Products-container">
    <div class="table">
      <ul class="tr">
        <li style="width: 10%;">名称</li>
        <li style="text-align: center;">描述</li>
        <li style="width: 20%;">图片</li>
        <li style="width: 10%;">价格</li>
        <li style="width: 10%;">加入购物车</li>
      </ul>
      <ul class="tr">
        <li><h4>轻声说再见</h4></li>
        <li>《轻声说再见》是《100个基本》作者、日每生活美学家松浦弥太郎先生初次坦露私密情感的散文集他以温润的笔触，书写那些在他生命中留下美好印记、给自己某项人生启事的人。</li>
        <li>
          <img src="Image/Whisper goodbye.jpg" style="width: 95px;">
        </li>
        <li>34.60</li>
        <li><a href="
          <?php
            if(isset($_SESSION['username'])){   
              echo "Products.php?bookName=WhisperGoodBye";            
            }else{
              echo "Login.php";
            }
          ?>
        ">加入购物车</a></li>
      </ul>
      <ul class="tr">
        <li><h4>奇迹集</h4></li>
        <li>《奇迹集》是黄灿然近年来关乎生活、信仰、灵魂的秘密之作，共分为五个部分：一、世界的光彩；二、现在让我们去爱街上任何一样东西；三、消逝；四、改变你自己；五、颂歌、此增订版新增四十首诗。</li>
        <li>
          <img src="Image/Miracle set.jpg">
        </li>
        <li>38.30</li>
        <li><a href="
        <?php
          if(isset($_SESSION['username'])){   
            echo "Products.php?bookName=MiracleSet";            
          }else{
            echo "Login.php";
          }
        ?>
        ">加入购物车</a></li>
      </ul>
      <ul class="tr">
        <li><h4>纳博科夫短篇小说全集</h4></li>
        <li>《纳博科夫短篇小说全集》是文学类大势纳博科夫的短篇小说作品在国内的首次完整结集。68则风格各异的短篇小说，有纳博科夫之子德米特里按照年代顺序编辑而成的。</li>
        <li>
          <img src="Image/Nabokov short stories.jpg" alt="">
        </li>
        <li>49.00</li>
        <li><a href="
        <?php
          if(isset($_SESSION['username'])){   
            echo "Products.php?bookName=NabokovShortStories";            
          }else{
            echo "Login.php";
          }
        ?>
        ">加入购物车</a></li>
      </ul>
      <ul class="tr">
        <li><h4>灵魂只能独行</h4></li>
        <li>哲学家、散文家周国平亲自编选，收录历年散文中最有价值的精华篇目，影响数代中国年亲人的人生只会，尽在其中。</li>
        <li>
          <img src="Image/Soul alone.jpg" alt="">
        </li>
        <li>22.50</li>
        <li><a href="
        <?php
          if(isset($_SESSION['username'])){   
            echo "Products.php?bookName=SoulAlone";            
          }else{
            echo "Login.php";
          }
        ?>
        ">加入购物车</a></li>
      </ul>
    </div>
  </div>
  <?php
    include 'public/Footer.html'
  ?>
</body>
</html>