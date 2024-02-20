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
$password=password_hash($pass,PASSWORD_DEFAULT);
// Validation
if (empty($user) || empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($address) || empty($pass) || empty($rpass)) {
    header("Location: ../login/register.php?error=Empty fields");
    exit();
} else if ($pass !== $rpass) {
    header("Location: ../login/register.php?error=Password mismatch");
    exit();
}else{
    //checking if username is used or user exists in the database
    $query = "SELECT * FROM customer WHERE customname=? or email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $user,$email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0){
        header("Location: ../login/register.php?error=User exists");
    }else{
        //adding user info
        $query = "INSERT INTO customer(customname,firstname,lastname,email,phone,address,password,role) VALUES(?,?,?,?,?,?,?,?)";
        $stmt->prepare($query);
        $stmt->bind_param("ssssssss",$user,$fname,$lname,$email,$phone,$address,$password,$role);
        $stmt->execute();
if($stmt->affected_rows>0){
    header("Location: ../login/login.php?error=Registration successful");
}else{
    header("Location: ../login/register.php?error=Registration failed");
}

    }

}