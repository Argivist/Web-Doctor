<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pharma &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">


  <link rel="stylesheet" href="../css/aos.css">

  <link rel="stylesheet" href="../css/style.css">

</head>

<body>

  <div class="site-wrap">


    <!--Navigation Bar-->
    <div class="site-navbar bg-primary py-2">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="home.php" class="js-logo-clone"><img src="../img/logo/logo.png" style="width:50px; border-radius:50px;" alt="logo" /></a>
            </div>
          </div>
          <div class="main-nav d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-lg-block">
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="shop.php">Store</a></li>
                <li class=""><a href="prescription.php">Prescription</a></li>

                <li><a href="aboutus.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          <?php
          if (isset($_SESSION['id'])) {
            echo "<div class='logout'><a href='../actions/logout.php'>Logout</a></div>";
          } else {
            echo "<div class='login'><a href='../login/login.php'>Sign in</a></div>";
          } ?>
          <div class="profile">
            <a href="
                  <?php
                  if (isset($_SESSION['id'])) {
                    echo "profile.php";
                  } else {
                    echo "../login/login.php";
                  }
                  ?>
                  "><img src="
                  <?php
                  if (isset($_SESSION['id'])) {
                    echo "../img/profile.jpg";
                  } else {
                    echo "../img/default_profile.jpg";
                  }
                  ?>
                  " alt="Image" class="rounded-circle" style="width:50px; border-radius:50px;"></a>
          </div>
        </div>
      </div>
    </div>


    <div class="site-blocks-cover inner-page" style="background-image: url('../img/background/pharmacy_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto align-self-center">
            <div class=" text-center">
              <h1>About Us</h1>
              <p> There's a need for a centralized platform that simplifies the process of finding and acquiring pharmaceutical products while also facilitating communication and transactions between different stakeholders in the industry.
              </p>ˀ
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light custom-border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="images/bg_1.jpg" alt="Image placeholder" class="img-fluid rounded">
                <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span class="icon-play"></span></a>

              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">


            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black">The solution</h2>
            </div>
            <p>We aim to solve the problem of access to information and streamline the pharmaceutical supply chain by providing a
              comprehensive online platform. This platform will cater to pharmacies, pharmaceutical businesses, and individual consumers,
              offering them a range of features to meet their needs</p>

          </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>