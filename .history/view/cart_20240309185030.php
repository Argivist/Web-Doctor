<?php
include "../settings/connection.php";
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../login/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add to cart</title>
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


    <div class="site-navbar py-2">
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

                <li><a href="aboutus.php">About</a></li>

              </ul>
            </nav>
          </div>
          <!-- Right Icons -->
          <div class="d-flex align-items-center justify-content-between">
            <?php
            if (isset($_SESSION['id'])) {
              echo "<div class='logout' style='margin-right:15px;'><a href='../actions/logout.php' title='log out'>
            <img src='https://img.icons8.com/ios-glyphs/30/000000/export.png' alt='log out'/>
            </a></div>";
            } else {
              echo "<div class='login' style='margin-right:15px;'><a href='../login/login.php' title='log in'>
            <img src='https://img.icons8.com/ios-glyphs/30/000000/import.png' alt='log in'/>
            </a></div>";
            } ?>
            <!-- cart -->
            <?php
            if (isset($_SESSION['id'])) {
              echo "<a href='cart.php' title='Shopping Cart'>
                <img style='margin-right:15px;' src='https://img.icons8.com/material-rounded/24/000000/shopping-cart.png'/>
                </a>";
            } else {
              echo "<a href='../login/login.php' title='log in'>
                <img style='margin-right:15px;' src='https://img.icons8.com/material-rounded/24/000000/shopping-cart.png'/></a>";
            }
            ?>

            <div class="profile">
              <!-- profile -->
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
    </div>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="pharmacy.html">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Cart</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../actions/get_cart.php';
                  include '../functions/list_cart.php';
                  $cart = getCart();

                  $count = 0;
                  foreach ($cart as $item) {
                    echo displayCart($item['med_id'], $item['img_url'], $item['medicine_name'], $item['qty'], $item['medicine_price'], $item['total_cost']);
                  }

                  ?>
                  <!-- list items -->
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
              <a href="">  <button class="btn btn-primary btn-md btn-block">Update Cart</button>
                </a></div>
              <div class="col-md-6">
                <a href="shop.php"><button class="btn btn-outline-primary btn-md btn-block">Continue Shopping</button>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php include '../actions/get_overall_total.php' ?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php include '../actions/get_overall_total.php' ?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <form method="post" action="../actions/purchase.php">
                      <input type="submit" name="buy" value="Proceed To Checkout" class="btn btn-primary btn-lg btn-block">
                    </form>
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='../actions/purchase.php'">Proceed To
                      Checkout</button>
                  </div>
                </div>
              </div>
            </div>
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
                <p>Explore.
                </p>
              </div>
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                <h2>Rated by Experts</h2>
                <p> Best Products for you.
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
                <li class="address">1 university Avenue Berekuso</li>
                <li class="phone"><a href="tel://23923929210">+233 549923288</a></li>
                <li class="email">priscile.nzonbi@ashesi.edu.gh</li>
              </ul>
            </div>


          </div>
        </div>

      </div>
    </footer>
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