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
    <div class="site-wrap justify-content-center">

    <div class="site-blocks-cover" style="background-image: url('../img/background/pharmacy_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Convinience Prescription Delivery, Secure Medication Purchases and others</h2>
              <h1>Login</h1>
              <p>
                <a href="
                        <?php
                        if(isset($_SESSION['id'])){
                            echo "shop.php";
                        }else{
                            echo "../login/login.php";
                        }
                        ?>" class="btn btn-primary px-5 py-3">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
<!-- 
        <div class="container bg-primary mb-6 mt-6 justify-content-center" style="border-radius:10px; width:30%;">

            <h2 class="justify-content-center">Login</h2>
            <form action="/action_page.php" class="was-validated" style="margin:50px;">
                <div class="mb-3 mt-3 ">
                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                </div>
                <div class="mb-3" style="margin-bottom:30px;">
                <button type="submit" class="btn btn-primary">Submit</button>
</div>
            </form>

        </div> -->
    </div>
</body>

</html>