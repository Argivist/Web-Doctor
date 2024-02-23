<?php
include "../settings/connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .chart-container {
      display: flex;
      justify-content: space-around;
      margin-bottom: 30px;
    }

    .chart-card {
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    .chart-title {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }
  </style>
</head>

<body>
    <div class="site-wrap">
        
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
                                
                                <li><a href="inventory.php">Inventory</a></li>
                                <li class="active"><a href="statistics.php">Check Stats</a></li>
                                <li class=""><a href="presc.php">Validate Prescriptions</a></li>
                                
                                <li><a href="aboutus.php">About</a></li>
                            
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
                                echo "../img/logo/logo.png";
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
        <div class="site-blocks-cover">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
          <div class="container">
    <h1>Pharmacy Statistics</h1>

    <div class="chart-container">
      <div class="chart-card">
        <div class="chart-title">Weekly Sales</div>
        <canvas id="weeklySalesChart" width="400" height="400"></canvas>
      </div>

      <div class="chart-card">
        <div class="chart-title">Customer Trend</div>
        <canvas id="customerTrendChart" width="400" height="400"></canvas>
      </div>
    </div>

    <div class="chart-card">
      <div class="chart-title">Top Selling Drugs</div>
      <canvas id="topSellingDrugsChart" width="800" height="400"></canvas>
    </div>
  </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>