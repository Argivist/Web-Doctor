<?php
// connection
require "../settings/connection.php";

$pattern = '/^(?=.*[0-9])(?=.*[!@#$%^&*()-_=+{};:\',.<>?])(?=.*[a-zA-Z]).{15,}$/';
// get the data from the form


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$pass = $_POST['passwd'];
$rpass=$_POST['rpasswd'];
$password=password_hash($pass,PASSWORD_DEFAULT);
// Validation
if ( empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($address) || empty($pass) || empty($rpass)) {
    header("Location: ../login/register.php?error=Empty fields");
    exit();
} else if (preg_match($pattern, $pass)) {
    header("Location: ../login/register.php?error=Password should be at least 15 characters long and contain at least one symbol and one number");
    exit();

}else if ($pass !== $rpass) {
    header("Location: ../login/register.php?error=Password mismatch");
    exit();
}else{
    //checking if username is used or user exists in the database
    $query = "SELECT * FROM people WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0){
        header("Location: ../login/register.php?error=User exists");
    }else{
        //adding user info
        $query = "INSERT INTO people (user_id,fname,lname,email,tel,address,passwd) VALUES(?,?,?,?,?,?,?)";
        $stmt->prepare($query);
        $user_id=0;
        $stmt->bind_param("isssiss",$user_id, $fname, $lname, $email, $phone, $address, $password);
        $stmt->execute();
if($stmt->affected_rows>0){
    header("Location: ../login/login.php?error=Registration successful");
}else{
    header("Location: ../login/register.php?error=Registration failed");
}

    }

}