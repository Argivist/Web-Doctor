<?php
require "../settings/connection.php";

$user=$_POST['uname'];
$pass=$_POST['passwd'];

 $query="SELECT * FROM customers WHERE username=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("s",$user);
    if($stmt->execute()){
        $row=$stmt->get_result()->fetch_assoc();
        if(password_verify($pass,$row['password'])){
            session_start();
            $_SESSION['id']=$row['id'];
            $_SESSION['username']=$row['username'];
            $_SESSION['email']=$row['email'];
            $_SESSION['phone']=$row['phone'];
            $_SESSION['address']=$row['address'];
            $_SESSION['role']=$row['role'];
            header("Location: ../view/home.php");
        }

