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
  <title><?php echo $_GET['name'] ?></title>
  <link rel="icon" href="../img/logo/logo.png" />
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
    <div class="site-navbar bg-light py-2">
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
                <li class=""><a href="home.php">Home</a></li>
                <li class="active"><a href="shop.php">Store</a></li>
                <li class=""><a href="prescription.php">Prescription</a></li>
                <li><a href="aboutus.php">About</a></li>

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

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="home.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="shop.php">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $_GET['name'] ?></strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <img src="<?php echo $_GET['url'] ?>" alt="Image" class="img-fluid p-5">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $_GET['name'] ?></h2>
            <p><?php echo $_GET['desc'] ?></p>


            <p><del>200.00 cedis</del> <strong class="text-primary h4"> <?php echo $_GET['price'] ?> cedis</strong></p>


            <form action="../actions/add_to_cart.php" method="get">
              <input type="hidden" name="medicine_id" value="<?php echo $_GET['id'] ?>">
              <input type="hidden" name="p_id" value="<?php echo $_SESSION['id'] ?>">
              <input type="hidden" name="price" value="<?php echo $_GET['price'] ?>">
              <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 220px;">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-primary js-btn-minus" type="button" id="subtract">&minus;</button>
                  </div>
                  <input type="text" class="form-control text-center" id="qty" name="qty" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary js-btn-plus" type="button" id="add">&plus;</button>
                  </div>
                </div>
                <script>
                  var add = document.getElementById("add");
                  var sub = document.getElementById("subtract");
                  var number = document.getElementById("qty");

                  add.addEventListener('click', () => {
                    number.value = parseInt(number.value) + 1;
                  });
                  sub.addEventListener('click', () => {
                    if (number.value > 0) {
                      number.value = parseInt(number.value) - 1;
                    } else {
                      // sub.disabled=true;
                    }
                  });
                </script>
              </div>
              <p>
              <button  class="buy-now buy-button btn btn-sm height-auto px-4 py-3 btn-primary" id="addCart">Add To Cart</button>
              </p>
            </form>
            <div class="mt-5">
              <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Ordering Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Specifications</a>
                </li>

              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table custom-table">
                    <thead>
                      <th>Material</th>
                      <th>Description</th>
                      <th>Packaging</th>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">OTC022401</th>
                        <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                        <td>1 BT</td>
                      </tr>
                      <tr>
                        <th scope="row">OTC022401</th>
                        <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                        <td>144/CS</td>
                      </tr>
                      <tr>
                        <th scope="row">OTC022401</th>
                        <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                        <td>1 EA</td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                  <table class="table custom-table">

                    <tbody>
                      <tr>
                        <td>HPIS CODE</td>
                        <td class="bg-light">999_200_40_0</td>
                      </tr>
                      <tr>
                        <td>HEALTHCARE PROVIDERS ONLY</td>
                        <td class="bg-light">No</td>
                      </tr>
                      <tr>
                        <td>LATEX FREE</td>
                        <td class="bg-light">Yes, No</td>
                      </tr>
                      <tr>
                        <td>MEDICATION ROUTE</td>
                        <td class="bg-light">Topical</td>
                      </tr>
                    </tbody>
                  </table>

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
                <p>Explore the variety.
                </p>
              </div>
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                <h2>Rated by Experts</h2>
                <p>This product works
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

<script>
  $(document).ready(function() {
    $('.buy-button').click(function() {
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
        $('.upload-prescription').click(function() {
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

</html>