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
    <style>
        /* Styles for the inventory table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
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
                                <li><a href="home.php">Home</a></li>

                                <li class="active"><a href="inventory.php">Inventory</a></li>
                                <li class=""><a href="statistics.php">Check Stats</a></li>
                                <li class=""><a href="presc.php">Validate Prescriptions</a></li>

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

    
        <div class="container">
        <div class="site-blocks-table">
        <h2 style="text-align:center;">Inventory Management System</h2>
              <center><button class="btn" onclick="addItem()">Add New Item</button></center>
              <table class="table table-bordered" id="inventoryTable">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Product ID</th>
                    <th class="product-name">Product</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-remove">Action</th>
                  </tr>
                </thead>
                <tbody id="inventoryBody">
                 
                  <!-- popup -->
                  <div id="addItemModal" style="display: none;">
                                <input type="text" id="productId" placeholder="Product ID"><br>
                                <input type="text" id="productName" placeholder="Product Name"><br>
                                <input type="number" id="quantity" placeholder="Quantity"><br>
                                <button class="btn" onclick="saveItem()">Save</button>
                                <button class="btn" onclick="cancelAddItem()">Cancel</button>
                            </div>
                </tbody>
              </table>
            </div>
        </div>
        <?php 
        include '../functions/inventory_list.php';
        invList();
        ?>
</body>

<script>
    // Sample inventory data
    let inventory = [{
            id: 1,
            name: "Product A",
            quantity: 10
        },
        {
            id: 2,
            name: "Product B",
            quantity: 20
        },
        {
            id: 3,
            name: "Product C",
            quantity: 15
        }
    ];
    // Function to render inventory table
    function renderInventory() {
        const tbody = document.getElementById("inventoryBody");
        tbody.innerHTML = "";
        inventory.forEach(item => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
            <td>${item.id}</td>
            <td>${item.name}</td>
            <td>${item.quantity}</td>
            <td><button class="btn" name="mid" value="${item.mid}"onclick="removeItem(${item.id})">Remove</button></td>
        `;
            tbody.appendChild(tr);
        });
    }

    // Function to add a new item
    function addItem() {
        document.getElementById("addItemModal").style.display = "block";
    }

    // Function to save the new item
    function saveItem() {
        const productId = document.getElementById("productId").value;
        const productName = document.getElementById("productName").value;
        const quantity = parseInt(document.getElementById("quantity").value);
        if (productId && productName && quantity) {
            inventory.push({
                id: productId,
                name: productName,
                quantity: quantity
            });
            renderInventory();
            cancelAddItem();
        } else {
            alert("Please fill all fields.");
        }
    }

    // Function to cancel adding a new item
    function cancelAddItem() {
        document.getElementById("addItemModal").style.display = "none";
    }

    // Function to remove an item
    function removeItem(id) {
        inventory = inventory.filter(item => item.id !== id);
        renderInventory();
    }
    // Render the initial inventory
    renderInventory();
</script>

</html>