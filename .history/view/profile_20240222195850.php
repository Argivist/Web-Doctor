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

        <!--Main Content-->
        <!--Image By: Photo by Alex Green: https://www.pexels.com/photo/pile-of-white-spilled-pills-5699514/-->
        <div class="site-blocks-cover" ">
        <!-- path -->
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="home.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Profile</strong></div>
        </div>
      </div>
    </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                        <div class="site-block-cover-content text-center text-dark" style="background: rgba(138,199,197,0.5); backdrop-filter:blur(10px);border: 1px #8ac7c5 solid; border-radius:5px; padding:4px;">
                            <!--Profile page-->
                            <h1 class="mb-0">Profile</h1>
                            <div class="justify-content-center ">
                                <div class="row">
                                    <div class="col">
                                        <p>Username</p><?php
                                                        echo $_SESSION['username'];
                                                        ?>
                                    </div>
                                    <div class="col">
                                        <p>First Name</p><?php
                                                            echo $_SESSION['fname'];
                                                            ?>
                                    </div>
                                    <div class="col">
                                        <p>Last Name</p><?php
                                                        echo $_SESSION['lname'];
                                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <p>Email</p><?php
                                                    echo $_SESSION['email'];
                                                    ?>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>Phone</p><?php
                                                    echo $_SESSION['phone'];
                                                    ?>
                                    </div>
                                    <div class="col">
                                        <p>Address</p><?php
                                                        echo $_SESSION['address'];
                                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a href="edit_profile.php" class="btn btn-primary px-5 py-3">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</body>

</html>