<?php
  session_start()
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
  <div class="Index-container">
    <ul>
      <li>
        <a href="Products.php">
          <img src="Image/literature2.jpg" alt="">
          <label>文学类</label>
        </a>
      </li>
      <li>
        <a href="#">
          <img src="Image/Economics.jpg" alt="">
          <label>经济类</label>
        </a>
      </li>
      <li>
        <a href="#">
          <img src="Image/IT.jpg" alt="">
          <label>IT类</label>
        </a>
      </li>
      <li>
        <a href="#">
          <img src="Image/novel.jpg" alt="">
          <label>小说类</label>
        </a>
      </li>
      <li>
        <a href="#">
          <img src="Image/education.jpg" alt="">
          <label>教育类</label>
        </a>
      </li>
    </ul>
  </div>
  <?php
    include 'public/Footer.html'
  ?>
</body>
</html>