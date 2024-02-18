<?php
// connection
require "../settings/connection.php";

// get the data from the form
$user = $_POST['uname'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$pass = $_POST['passwd'];
$rpass=$_POST['rpasswd'];

// Validation
if (empty($user) || empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($address) || empty($pass) || empty($rpass)) {
    header("Location: ../login/register.php?error=Empty fields");
    exit();
} else if ($pass !== $rpass) {
    header("Location: ../login/register.php?error=Password mismatch");
    exit();
}