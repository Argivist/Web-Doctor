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
                        <p>Already have an account?<a href="login.php">Login</a></p>
                            <h2 class="sub-title"><?php if (isset($_GET['error'])) {
                                                        echo $_GET['error'];
                                                    } else {
                                                        echo "Convinience Prescription Delivery, Secure Medication Purchases and others";
                                                    } ?></h2>
                            <h1>Sign Up</h1>
                            <form action="../actions/login_user.php" method="POST" class="was-validated">
                                <div class="mb-3 mt-3 ">
                                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                                </div>
                                <div class="mb-3">
                                    <!--firstname-->
                                    <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="passwd" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" id="pwd" placeholder="Re-enter password" name="passwd" required>
                                </div>
                                <div class="mb-3" style="margin-bottom:30px;">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                    
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>

            </div>
</body>

</html>