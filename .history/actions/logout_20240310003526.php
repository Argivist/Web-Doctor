<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
if (isset($_SESSION['cart_items'])) {
    unset($_SESSION['cart_items']);
}
header("Location: ../view/home.php");
