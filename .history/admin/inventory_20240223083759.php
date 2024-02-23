<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php 
    if(!isset($_SESSION['username'])){
      echo $_SESSION['username'];
    }
    ?></title>
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



    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="pharmacy.html" class="js-logo-clone"> <?php if(!isset($_SESSION['username'])){
                echo $_SESSION['username'];
              }
              ?></a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="pharmacy.php">Home</a></li>
                <li><a href="inventory.php">Inventory</a></li>
                <li class="active"><a href="aboutus.php">About</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
<h2>Inventory Management System</h2>
<button onclick="addItem()">Add New Item</button>
<table id="inventoryTable">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="inventoryBody">
        <!-- Inventory items will be dynamically added here -->
    </tbody>
</table>

<!-- Modal for adding new item -->
<div id="addItemModal" style="display: none;">
    <input type="text" id="productId" placeholder="Product ID"><br>
    <input type="text" id="productName" placeholder="Product Name"><br>
    <input type="number" id="quantity" placeholder="Quantity"><br>
    <button onclick="saveItem()">Save</button>
    <button onclick="cancelAddItem()">Cancel</button>
</div>

<script>
// Sample inventory data
let inventory = [
    { id: 1, name: "Product A", quantity: 10 },
    { id: 2, name: "Product B", quantity: 20 },
    { id: 3, name: "Product C", quantity: 15 }
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
            <td><button onclick="removeItem(${item.id})">Remove</button></td>
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
        inventory.push({ id: productId, name: productName, quantity: quantity });
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
</body>
</html>
