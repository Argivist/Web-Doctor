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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <link rel="icon" href="../img/logo/logo.png"/>

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/aos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;

        }

        .prescription-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .prescription {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .prescription img {
            max-width: 100%;
        }

        .reason-modal .modal-dialog {
            max-width: 400px;
        }
    </style>
</head>

<body>
    <div class="site-wrap">

        <!--Navigation Bar-->
        <div class="site-navbar bg-primary">
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
                                <li><a href="shop.php">Store</a></li>
                                <li class="active"><a href="prescription.php">Prescription</a></li>
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

        <!--Main Content-->
        <!--Image By: Photo by Alex Green: https://www.pexels.com/photo/pile-of-white-spilled-pills-5699514/-->
        <div class="site-blocks-cover">
            <!-- path -->
            <div class=" bg-light py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-0"><a href="home.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Prescription</strong></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="prescription-container">
                    <?php
                    // Check if there are prescriptions waiting for validation
                    // For demonstration purposes, here we simulate prescriptions with dummy data
                    $prescriptions = array(
                        array('id' => 1, 'customer_name' => 'John Doe', 'image' => 'prescription1.jpg'),
                        array('id' => 2, 'customer_name' => 'Alice Smith', 'image' => 'prescription2.jpg'),
                        array('id' => 3, 'customer_name' => 'Bob Johnson', 'image' => 'prescription3.jpg')
                        // Add more prescriptions here as needed
                    );

                    // Display each prescription
                    foreach ($prescriptions as $prescription) {
                        echo "<div class='site-block-cover-content text-center'>";
                        echo "<div class='prescription'>";
                        echo "<h3>Prescription By Dr. " . $prescription['customer_name'] . "</h3>";
                        echo "<img src='https://th.bing.com/th/id/OIP.WGI1fFOg0U-dZZIQWAQb1AHaKu?w=120&h=180&c=7&r=0&o=5&dpr=1.5&pid=1.7' alt='Prescription'>";
                        echo "<button class='validation-button' onclick='validatePrescription(" . $prescription['id'] . ")'>Validate Prescription</button>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>

                    <!-- JavaScript for prescription validation -->
                    <script>
                        function validatePrescription(prescriptionId) {
                            // Send an AJAX request to a PHP script to handle prescription validation
                            // You can implement this part based on your server-side validation process
                            // For demonstration purposes, we'll just show an alert
                            alert("Prescription ID " + prescriptionId + " validated successfully!");
                            // You may want to reload the page or update the UI after validation
                        }
                    </script>
                </div>
                        
                <!-- Validated Prescriptions -->
                <div class="site-blocks-table">
              <table class="table table-bordered">
                <h2 class="text-center" color="grey">Valid</h2>
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Medication</th>
                    <th class="product-quantity">Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../actions/get_presc.php';
                  include '../functions/list_presc.php';
                  $cart = getPresc();

                  $count = 0;
                  foreach ($cart as $item) {
                    if($item['approved']==1){
                    echo displayPresc($item['med_id'], $item['img_url'], $item['medicine_name'], $item['qty']);
                      }
                      }

                  ?>
                  <!-- list items -->
                </tbody>
              </table>
            </div>



            </div>

            <!-- footer -->
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
</body>

</html>