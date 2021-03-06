<?php
include_once("setdb.php");
include_once("array.php");
include_once("url.php");
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
  <!-- Site made with Mobirise Website Builder v4.9.7, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <meta name="description" content="">
  <title>提斯牙科診所 Teeth Dental</title>
  <link rel="stylesheet"  href="css/all.min.css"><!--fontawesome-->
  <link href="css/mycss_table.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    
</head>
<style>
h3 ,h4{
    font-family:"微軟正黑體";
}

</style>
<body>
  <section class="menu cid-rlpoEFQO0W" once="menu" id="menu1-1">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                        <div class="logopc"></div>
                        <div class="logom"></div>
                    </a>
                </span>
                <span class="navbar-caption-wrap">
                    <a class="navbar-caption text-white display-4" href="index.php">
                        <h3 class="logotxt">提斯牙科診所</h3>
                    </a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-4 " href="?td=about"><span class="mbri-user mbr-iconfont mbr-iconfont-btn "></span>
                        
                        <h4 class="menutxt menutxtpad">關於我們</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="?td=worktime"><span class="mbri-calendar mbr-iconfont mbr-iconfont-btn"></span>
                        
                    <h4 class="menutxt menutxtpad">門診時間</h4>
                    </a>
                </li><li class="nav-item"><a class="nav-link link text-white display-4" href="?td=search">
                        <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                        <h4 class="menutxt menutxtpad">預約查詢</h4>
                    </a></li>
                    <?php if(empty($_SESSION["acc"])){?> 
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="?td=login">
                        <span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                        <h4 class="menutxt menutxtpad">登<span class="log-in-out" style="display:none;">　　</span>入</h4>
                    </a></li>
                    <?php }else{?>
                        <li class="nav-item"><a class="nav-link link text-white display-4" href="admin.php">
                        <span class="mbri-setting mbr-iconfont mbr-iconfont-btn"></span>
                        <h4 class="menutxt menutxtpad">後台控制</h4>
                    </a></li>
                        <li class="nav-item"><a class="nav-link link text-white display-4" href="?td=out">
                        <span class="mbri-logout mbr-iconfont mbr-iconfont-btn"></span>
                        <h4 class="menutxt menutxtpad">登<span class="log-in-out" style="display:none;">　　</span>出</h4>
                    </a></li>

                    <?php
                    }
                    ?>
            </ul>


        </div>
    </nav>
</section>

<!--------------------------------------------------body-------------------------------------------------------->
            <?php
            include_once($gogo);
            ?>
<!--------------------------------------------------footer-------------------------------------------------------->
<section once="footers" class="cid-rlprAYpkZ1" id="footer6-6">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    ©2019 DigitalHKL
                </p>
            </div>
        </div>
    </div>
</section>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/theme/js/script.js"></script>

</body>
</html>