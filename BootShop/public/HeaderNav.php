<link rel="stylesheet" href="Style.css">
<div class="headbgc">
  <header>网上书店</header>
  <nav>
    <ul>
      <li><a href="Index.php">主页</a></li>
      <li><a href="Register.php">用户注册</a></li>
      <li><a href="UserProfile.php">用户信息</a></li>
      <li><a href="ShoppingCart.php">购物车</a></li>
      <!-- <li><a href="Search.php">搜索</a></li> -->
      <li>
        <?php
        if(isset($_SESSION['username'])){
          echo '<a href="public/Logout.php">注销</a>';
        }else{
          echo '<a href="Login.php">用户登录</a>';
        }
        ?>
      </li>
    </ul>
    <div class="right">
      <?php
        if(isset($_SESSION['username'])){
          echo $_SESSION['username'].',';
        }
      ?>
      欢迎访问网上书城系统
    </div>
  </nav>
</div>
<main>

