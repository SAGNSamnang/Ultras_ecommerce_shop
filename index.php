<?php

  include 'config.php';
  include 'libraries/database.php';

  $page = "home.php";
  $slider = true;
  if(isset($_GET['p'])) {
    $p = $_GET['p'];
    switch($p) {
      case "about":
        $page = "about.php";
        $slider = false;
        break;
      case "shop":
        $page = "shop.php";
        $slider = false;
        break;
      case "blog":
        $page = "blog.php";
        $slider = false;
        break;
      case "contact":
        $page = "contact.php";
        $slider = false;
        break;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <?php include 'includes/head.php'; ?>
  <body>

    <div class="preloader-wrapper">
      <div class="preloader">
      </div>
    </div>

    <div class="search-popup">
      <div class="search-popup-container">

        <form role="search" method="get" class="search-form" action="">
          <input type="search" id="search-form" class="search-field" placeholder="Type and press enter" value="" name="s" />
          <button type="submit" class="search-submit"><a href="#"><i class="icon icon-search"></i></a></button>
        </form>

        <h5 class="cat-list-title">Browse Categories</h5>
        
        <ul class="cat-list">
          <li class="cat-list-item">
            <a href="shop.html" title="Men Jackets">Men Jackets</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Fashion">Fashion</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Casual Wears">Casual Wears</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Women">Women</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Trending">Trending</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Hoodie">Hoodie</a>
          </li>
          <li class="cat-list-item">
            <a href="shop.html" title="Kids">Kids</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- start header  -->
    <?php include 'includes/header.php'; ?>
    <!-- end header  -->

    <!-- start slider  -->
    <?php
      if($slider) include 'includes/slider.php'
    ?>
    <!-- end slider  -->

    <!-- start page  -->
    <?php include $page; ?>
    <!-- end page  -->

    

    <!-- start footer  -->
    <?php include 'includes/footer.php'; ?>
    <!-- end footer   -->

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>