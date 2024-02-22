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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
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
                                <li class="active"><a href="Prescription.php">Prescription</a></li>
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

        <!--Main Content-->
        <!--Image By: Photo by Alex Green: https://www.pexels.com/photo/pile-of-white-spilled-pills-5699514/-->
        <div class="site-blocks-cover" ">
        <!-- path -->
<div class=" bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="home.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Profile</strong></div>
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
            echo "<div class='prescription'>";
            echo "<h3>Prescription for " . $prescription['customer_name'] . "</h3>";
            echo "<img src='prescriptions/" . $prescription['image'] . "' alt='Prescription'>";
            echo "<button class='validation-button' onclick='validatePrescription(" . $prescription['id'] . ")'>Validate Prescription</button>";
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
        
</body>

</html>