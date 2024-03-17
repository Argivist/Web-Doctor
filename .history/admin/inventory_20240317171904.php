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
                          echo "../img/logo/logo.png";
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
                  <div id="addItemModal" class="popup" style="display: none;">
                            <div class="popup-item">
                                <input type="text" id="productId" name="prodID" placeholder="Product ID" hidden><br>
                                <input type="text" id="productName" name="prodName" placeholder="Product Name"><br>
                                <input type="number" id="quantity" name = "quantity" placeholder="Quantity"><br>
                                <input type="number" id="price" name = "price" placeholder="Price"><br>
                                <textarea id="desc" name="desc" placeholder="Description"></textarea><br>
                                <button class="btn" onclick="saveItem()">Save</button>
                                <button class="btn" onclick="cancelAddItem()">Cancel</button>
                            </div>
                  </div>
                  <div id="update"></div>
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <!-- <div id="addItemModal" class="popup"> 
        <div class="popup-item">
            <input type="text" id="productName" name="prodName" placeholder="Product Name"><br>
            <input type="number" id="quantity" name="quantity" placeholder="Quantity"><br>
            <button class="btn" onclick="saveItem()">Save</button>
            <button class="btn" onclick="cancelAddItem()">Cancel</button>
                    </div>
        </div> -->
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
</body>

<script>
    // Sample inventory data
    let inventory = <?php
                    include '../functions/inventory_list.php';
                    invList();
                    ?>;
    // Function to render inventory table
    function renderInventory() {
    //    fetch("../functions/inventory_list.php").then(response => response.text()).then(data => {
    //     inventory = data; // log the echoed data from PHP
    // })
    // .catch((error) => {
    //     console.error('Error:', error);
    // });
        const tbody = document.getElementById("inventoryBody");
        tbody.innerHTML = "";
        inventory.forEach(item => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
            <td>${item.id}</td>
            <td>${item.name}</td>
            <td>${item.quantity}</td> 
            <td><button class="btn" name="mid" value="${item.id}"onclick="removeItem(${item.id})">Remove</button></td>
            <td><button class="btn" name="mid" value="${item.id}" onclick="updateItem(${item.id})">Update</button></td>
        `;
            tbody.appendChild(tr);
        });
    }
    async function updateItem(id) {
    const response = fetch("../actions/get_inventory_action.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            id: id
        })
    }).then(response => response.json()).then(data => {
        console.log(data);
    });
    //var medinv = await response.json();

    // document.getElementById("update").innerHTML = `
    // <div id="addItemModal" class="popup" style="display: none;">
    //     <div class="popup-item">
    //         <form action="../actions/update_inventory_action.php" method="POST">
    //             <input type="text" id="productId" name="prodID" value="${id}" hidden><br>
    //             <input type="number" id="quantity" name="quantity" value="`+medinv['medicine_qty']+`" placeholder="Quantity"><br>
    //             <input type="number" id="price" name="price" value="`+medinv['medicine_price']+`" placeholder="Price"><br>
    //             <textarea id="desc" name="desc" placeholder="Description">`+medinv['desc']+`</textarea><br>
    //             <button class="btn" type="submit" name="updateBtn">Update</button>
    //             <button class="btn" onclick="cancelUItem()">Cancel</button>
    //         </form>
    //     </div>
    // </div>
    // `;
}


    

    function cancelUItem(){
      document.getElementById("update").innerHTML = ``;
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
        const price = parseInt(document.getElementById("price").value);
        const desc = document.getElementById("desc").value;
      
        if ( productName && quantity) {
            //adding to the Inventory
            fetch("../actions/add_to_inventory_action.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                  addBtn:"0",
                  prodName: productName,
                  quantity: quantity,
                  price: price,
                  desc: desc
                })
            }).then(response => response.json())
                // .then(data => {
                //     inventory.push(data);
                //     renderInventory();
                // });
            
        } else {
            alert("Please fill all fields.");
        }
        window.location.reload();
    }

    // Function to cancel adding a new item
    function cancelAddItem() {
        document.getElementById("addItemModal").style.display = "none";
    }

    // Function to remove an item
    function removeItem(id) {
        window.location.href = `../actions/delete_from_inventory_action.php?id=${id}`;
    }
    // Render the initial inventory
    renderInventory();
</script>

</html>