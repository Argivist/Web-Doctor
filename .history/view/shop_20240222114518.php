<?php
require "../settings/connection.php";
session_start();
if(!isset($_SESSION['id'])){
  header("Location: ../login/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>The Pharmacy</title>
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

  <style>
    .prescription {
      margin-top: 10px;
    }

      .white-popup {
        background: #fff;
        padding: 20px;
        max-width: 400px;
        margin: 0 auto;
        text-align: center;
        border-radius: 5px;
      }
    
      .white-popup input[type="file"] {
        margin-bottom: 10px;
      }
    
      .white-popup button {
        background-color: #04e2f6;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
      }
   
    
  </style>

</head>

<body>

  <div class="site-wrap">


    <!-- <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="pharmacy.html" class="js-logo-clone">The Pharmacy</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="pharmacy.html">Home</a></li>
                <li class="active"><a href="shop.html">Store</a></li>
                <li class="has-children">
                  <a href="#">Dropdown</a>
                  <ul class="dropdown">
                    <li><a href="#">Supplements</a></li>
                    <li class="has-children">
                      <a href="#">Vitamins</a>
                    </li>
                    <li><a href="#">Diet &amp; Nutrition</a></li>
                    <li><a href="#">Tea &amp; Coffee</a></li>

                  </ul>
                </li>
                <li><a href="aboutus.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div> -->
        <!--Navigation Bar-->
        <div class="site-navbar bg-primary py-2">
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
                                <li class=""><a href="home.php">Home</a></li>
                                <li class="active"><a href="shop.php">Store</a></li>
                                <li><a href="aboutus.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <?php
                    if(isset($_SESSION['id'])){
                        echo "<div class='logout'><a href='../actions/logout.php'>Logout</a></div>";
                    }else{
                        echo "<div class='login'><a href='../login/login.php'>Sign in</a></div>";
                    }?>
                    <div class="profile">
                        <a href="
                        <?php
                        if(isset($_SESSION['id'])){
                            echo "profile.php";
                        }else{
                            echo "../login/login.php";
                        }
                        ?>
                        "><img src="
                        <?php
                            if(isset($_SESSION['id'])){
                                echo "../img/profile.jpg";
                            }else{
                                echo "../img/default_profile.jpg";
                            }
                        ?>
                        " alt="Image" class="rounded-circle" style="width:50px; border-radius:50px;"></a>
                    </div>
                </div>
            </div>
        </div>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="home.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Store</strong></div>
        </div>
      </div>
    </div>

    <div class="container">
      <?php 
      include '../functions/med_list_fxn.php';
      ?>
      <!-- <div class="row">
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="shop-single.html"> <img src="images/product_01.png" alt="Image"></a>
          <h3 class="text-dark"><a href="shop-single.html">Bioderma</a></h3>
          <p class="price"><del>95.00</del> &mdash; 55.00 cedis</p>
          <p class="inventory">Inventory: 10</p>
          <button class="btn btn-primary buy-button" data-drug="Bioderma" data-prescription-required="true">Buy Bioderma</button>
          <input type="file" class="prescription d-none">
        </div>
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="shop-single.html"> <img src="images/product_02.png" alt="Image"></a>
          <h3 class="text-dark"><a href="shop-single.html">Chanca Piedra</a></h3>
          <p class="price">70.00 cedis</p>
          <p class="inventory">Inventory: 5</p>
          <button class="btn btn-primary buy-button" data-drug="Chanca Piedra" data-prescription-required="false">Buy Chanca Piedra</button>
        </div>
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="shop-single.html"> <img src="images/product_03.png" alt="Image"></a>
          <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>
          <p class="price">120.00 cedis</p>
          <p class="inventory">Inventory: 3</p>
          <button class="btn btn-primary buy-button" data-drug="Umcka Cold Care" data-prescription-required="true">Buy Umcka Cold Care</button>
          <input type="file" class="prescription d-none">
        </div>
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="shop-single.html"> <img src="images/product_04.png" alt="Image"></a>
          <h3 class="text-dark"><a href="shop-single.html">cety1Pure</a></h3>
          <p class="price">130.00 cedis</p>
          <p class="inventory">Inventory: 6</p>
          <button class="btn btn-primary buy-button" data-drug="cety1Pure" data-prescription-required="true">Buy cety1Pure</button>
          <input type="file" class="prescription d-none">
        </div>
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="shop-single.html"> <img src="images/product_05.png" alt="Image"></a>
          <h3 class="text-dark"><a href="shop-single.html">ClaCore</a></h3>
          <p class="price">140.00 cedis</p>
          <p class="inventory">Inventory: 120</p>
          <button class="btn btn-primary buy-button" data-drug="ClaCore" data-prescription-required="false">Buy ClaCore</button>
        </div>
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <a href="shop-single.html"> <img src="images/product_06.png" alt="Image"></a>
          <h3 class="text-dark"><a href="shop-single.html">Poo-Pourrie</a></h3>
          <p class="price">100.00 cedis</p>
          <p class="inventory">Inventory: 27</p>
          <button class="btn btn-primary buy-button" data-drug="Poo-Pourrie" data-prescription-required="false">Buy Poo-Pourrie</button>
        </div>

     Add more drug items here 
      </div> -->

    </div>

  </div>

  <div class="row mt-5">
    <div class="col-md-12 text-center">
      <div class="site-block-27">
        <ul>
          <li><a href="#">&lt;</a></li>
          <li class="active"><span>1</span></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">&gt;</a></li>
        </ul>
      </div>
    </div>
  </div>

  </div>

  <div class="site-section bg-secondary bg-image" style="background-image: url('images/bg_2.jpg');">
    <div class="container">
      <div class="row align-items-stretch">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_1.jpg');">
            <div class="banner-1-inner align-self-center">
              <h2>The Pharmacy Products</h2>
              <p>Find your products here.
              </p>
            </div>
          </a>
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
            <div class="banner-1-inner ml-auto  align-self-center">
              <h2>Rated by Experts</h2>
              <p>You can trust us, we got your back.
              </p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

          <div class="block-7">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>We aim to solve the problem of access to information and streamline the pharmaceutical supply chain by providing a 
              comprehensive online platform. This platform will cater to pharmacies, pharmaceutical businesses, and individual consumers, 
              offering them a range of features to meet their needs</p>
          </div>

        </div>
        <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
          <h3 class="footer-heading mb-4">Quick Links</h3>
          <ul class="list-unstyled">
            <li><a href="#">Supplements</a></li>
            <li><a href="#">Vitamins</a></li>
            <li><a href="#">Diet &amp; Nutrition</a></li>
            <li><a href="#">Tea &amp; Coffee</a></li>
          </ul>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="block-5 mb-5">
            <h3 class="footer-heading mb-4">Contact Info</h3>
            <ul class="list-unstyled">
              <li class="address">1 University Avenue Berekuso</li>
              <li class="phone"><a href="tel://23923929210">+233 54992328</a></li>
              <li class="email">priscile.nzonbi@ashesi.edu.gh</li>
            </ul>
          </div>


        </div>
      </div>

    </div>
  </footer>

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script>src="../js/shop.js"</script>

  <script src="../js/main.js"></script>

  <script>
    $(document).ready(function () {
      $('.buy-button').click(function () {
        var drugName = $(this).attr('data-drug');
        var prescriptionRequired = $(this).attr('data-prescription-required') === 'true';
  
        if (prescriptionRequired) {
          // Display popup for prescription upload
          var popupContent = '<div>Prescription is required for ' + drugName + '. Please upload a prescription.</div>';
          popupContent += '<input type="file" class="prescription">';
          popupContent += '<button class="btn btn-primary upload-prescription">Upload Prescription</button>';
          $.magnificPopup.open({
            items: {
              src: '<div class="white-popup">' + popupContent + '</div>',
              type: 'inline'
            }
          });
  
          // Process the purchase after prescription validation
          $('.upload-prescription').click(function () {
            var uploadedPrescription = $('.prescription').prop('files')[0];
            if (uploadedPrescription) {
              alert('Prescription uploaded for ' + drugName + '. It will take some time while we validate the prescription.');
              // Close the popup after processing
              $.magnificPopup.close();
            } else {
              alert('Please upload a prescription.');
            }
          });
        } else {
          // Process the purchase
          alert('Processing purchase of ' + drugName + '...');
        }
      });
    });
  </script>
  

</body>

</html>