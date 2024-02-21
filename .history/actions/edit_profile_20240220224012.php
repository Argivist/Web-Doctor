<?php
require "../settings/connection.php";

session_start();
$or_email=$_SESSION['email'];
$email=$_POST['email'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$pass=$_POST['pwd'];
$opwd=$_POST['opwd'];

$query="SELECT * FROM people WHERE email=?";
$stmt=$conn->prepare($query);
$stmt->bind_param("s",$or_email);

$stmt->execute();

$res=$stmt->get_result();

if($res->num_rows>0){
    $row=$res->fetch_assoc();
    if(password_verify($opwd,$row['passwd'])){
        $query="UPDATE people SET fname=?,lname=?,email=?,tel=?,address=?,password=? WHERE email=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("sssssss",$fname,$lname,$email,$phone,$address,$email,$pass);
        $stmt->execute();
        if($stmt->affected_rows>0){
            $_SESSION['fname']=$fname;
            $_SESSION['lname']=$lname;
            $_SESSION['email']=$email;
            $_SESSION['phone']=$phone;
            $_SESSION['address']=$address;
            header("Location: ../view/profile.php?error=Profile updated");
        }else{
            header("Location: ../view/edit_profile.php?error=Profile not updated");
        }
    }else{
        header("Location: ../view/edit_profile.php?error=Invalid password");
    }
}else{
    header("Location: ../view/edit_profile.php?error=Invalid email");
}