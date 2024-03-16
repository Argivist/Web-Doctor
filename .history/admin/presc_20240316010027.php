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
    <link rel="icon" href="../img/logo/logo.png" />

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/popup.css">
    <script src="../js/popup.js"></script>
    <script src="../js/ajax_.js"></script>


    <!-- <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;

        }

        .prescription-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .prescription {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .prescription:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .prescription img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .prescription h3 {
            color: #343a40;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .btn {
            border-radius: 20px;
            font-size: 16px;
            padding: 10px 20px;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .modal-content {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .modal-header,
        .modal-body,
        .modal-footer {
            border: none;
        }

        .modal-title {
            color: #343a40;
            font-size: 24px;
        }

        .modal-body p {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .badge {
            font-size: 14px;
            border-radius: 20px;
        }

        .badge-secondary {
            background-color: #6c757d;
        }

        .badge-success {
            background-color: #28a745;
        }

        /* .prescription {
            margin-top: 10px;
        } */

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
    </style> -->
    <style>
        .btn {
            margin-top: 10px;
        }

        .safer:hover {
            border: green solid 2px;
        }

        .danger:hover {
            border: red solid 2px;
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
                            <a href="home.php" class="js-logo-clone"><img src="../img/logo/logo.png" style="width:50px; border-radius:50px;" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="main-nav d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-lg-block">
                                <li class=""><a href="home.php">Home</a></li>

                                <li><a href="inventory.php">Inventory</a></li>
                                <li class=""><a href="statistics.php">Check Stats</a></li>
                                <li class="active"><a href="presc.php">Validate Prescriptions</a></li>

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
                            echo "../img/logo/logo.png";
                        } else {
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


                <!-- Profile Modal -->
                <div class="modal fade popup" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="profileModalLabel">Buyer Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Name: <span id="buyerName"></span></p>
                                <p>Age: <span id="buyerAge"></span></p>
                                <p>Adult: <span id="isAdult"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reason Modal -->
                <!-- <div class="modal fade reason-modal" id="reasonModal" tabindex="-1" role="dialog" aria-labelledby="reasonModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="reasonModalLabel">Provide Reason for Rejection</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="form-control rejection-reason" rows="4"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger submit-rejection">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- new list -->
                <div class="site-blocks-table">
                    <!-- Adding patient -->
                    <div class="container">
                        <h2 style="text-align:center;">Prescription Validation</h2>
                        <center><button class="btn" onclick="openPopup('popup_add_presc')">Add Prescription</button></center>
                    </div>
                </div>
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Medication</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-price">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../actions/get_all_presc.php';
                        include '../functions/list_presc_action.php';
                        $presc = getPresc();

                        $count = 0;
                        foreach ($presc as $item) {

                            echo displayPresc($item["prescript_id"],$item['medicine_id'], $item['img_url'], $item['medicine_name'], $item['qty'], $item['desc'], $item['medicine_price']);
                        }

                        ?>
                    </tbody>
                    <table>
            </div>
        </div>
    </div>
    <!-- popup -->
    <div class="popup" id="popup_add_presc">
        <div class="popup-item">
            <div class="popup-header">
                <h2>Add Prescription</h2>
                <span class="close" onclick="closePopup('popup_add_presc')">&times;</span>
            </div>
            <div class="popup-body">
                <div class="error" id="error"></div>
                <!-- <form action="../actions/add_presc.php" method="post" enctype="multipart/form-data"> -->
                <div class="form-group  mb-2">
                    <label for="medicine">Medicine ID</label>
                    <input type="text" class="form-control" id="medicine" name="medid" required>
                    <label for="patient"> Patient ID</label>
                    <input type="text" class="form-control" id="patient" name="pid" required>
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                    <label for="file">Prescription</label>
                    <input type="file" name="file" id="file" required>
                    <input type="submit" class="btn btn-primary" value="Add Prescription" onclick="add_presc('medicine','patient','quantity','error')">
                </div>
            </div>
        </div>
        <script>
            
        </script>
</body>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/aos.js"></script>

<script src="js/main.js"></script>


<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle click on view profile button
        $('.view-profile-button').click(function() {
            var buyerName = $(this).data('name');
            var buyerAge = $(this).data('age');
            $('#buyerName').text(buyerName);
            $('#buyerAge').text(buyerAge);
            $('#isAdult').text(buyerAge >= 18 ? "Yes" : "No");
        });

        // Handle click on validate button
        $('.validate-button').click(function() {
            var prescription = $(this).closest('.prescription');
            var prescid = $(this).data('product-id');
            
            validatePrescription(prescription, prescid);
        });

        // Handle click on reject button
        $('.reject-button').click(function() {
            var presid = $(this).data('product-id');
            // $('.rejection-reason').data('product-name', productName);
            rejectPrescription(presid);//prescription, productName, rejectionReason);
        });

        // Handle click on submit rejection button
        // $('.submit-rejection').click(function() {
        //     var prescription = $('.rejection-reason').closest('.prescription');
        //     var productName = $('.rejection-reason').data('product-name');
        //     var rejectionReason = $('.rejection-reason').val();
        //     rejectPrescription(prescription, productName, rejectionReason);
        //     $('#reasonModal').modal('hide');
        // });

        // Function to validate prescription
        function validatePrescription(prescription, prescid) {
            fetch(
                '../actions/prescription.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: 0,
                        pid: prescid
                    })
                }
            ).then(response => response.json()).then(data => {
                if (data.status === "Success") {
                    alert('Prescription validated successfully');
                
                } else {
                    alert('Prescription validation failed');
                }
                window.location.reload();
            });
            // prescription.find('.validation-status').removeClass('badge-secondary').addClass('badge-success').text('Validated');
        }

        // Function to reject prescription
        function rejectPrescription(prescid){//prescription, productName, rejectionReason) {
            fetch(
                '../actions/prescription.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: 1,
                        pid: prescid
                    })
                }
            ).then(response => response.json()).then(data => {
                if (data.status === "Success") {
                    alert('Prescription validated successfully');
                
                } else {
                    alert('Prescription validation failed');
                }
                window.location.reload();
            });
            // Send AJAX request to reject prescription
            // prescription.find('.validation-status').removeClass('badge-secondary').addClass('badge-danger').text('Rejected');
            // You may want to update the UI to reflect rejection reason
        }
    });
</script>

</html>