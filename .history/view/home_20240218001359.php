<?php
include "../settings/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/aos.css">
</head>

<body>
    <div class="site-wrap">
        <!--Navigation Bar-->
        <div class="fixed-top site-navbar bg-primary py-2">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="home.php" class="js-logo-clone"><img src="../img/logo/logo.png"  style="width:50px; border-radius:50px;" alt="logo"/></a>
                        </div>
                    </div>
                    <div class="main-nav d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-lg-block">
                                <li class="active"><a href="pharmacy.html">Home</a></li>
                                <li><a href="shop.html">Store</a></li>
                                <li><a href="aboutus.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="profile">
                        <a href="
                        <?php
                        if(isset($_SESSION['id'])){
                            echo "profile.php";
                        }else{
                            echo "login.php";
                        }
                        ?>
                        "><img src="
                        <?php
                            if(isset($_SESSION['id'])){
                                echo "../img/profile.jpg";
                            }else{
                                echo "../img/profile.jpg";
                            }
                        ?>
                        " alt="Image" class="rounded-circle" style="width:50px; border-radius:50px;"></a>
                    </div>
                </div>
            </div>
        </div>

        <!--Main Content-->
        <!--Image By: Photo by Alex Green: https://www.pexels.com/photo/pile-of-white-spilled-pills-5699514/-->
        <div class="site-blocks-cover" style="background-image: url('../img/background/pharmacy_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Convinience Prescription Delivery, Secure Medication Purchases and others</h2>
              <h1>Welcome To The Web Doctor</h1>
              <p>
                <a href="#" class="btn btn-primary px-5 py-3">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>