<?php
session_start();

// Check if cart items are available in the session
if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'])) {
    // Loop through each cart item
    foreach($_SESSION['cart_items'] as $item) {
        // Output the details of each item
        echo "Product ID: " . $item['p_id'] . "<br>";
        echo "Medicine ID: " . $item['med_id'] . "<br>";
        echo "Quantity: " . $item['qty'] . "<br>";
        echo "Total Cost: " . $item['total_cost'] . "<br>";
        echo "<hr>"; // Add a horizontal line between items
    }
} else {
    echo "Your cart is empty."; // Display a message if the cart is empty
}
?>
