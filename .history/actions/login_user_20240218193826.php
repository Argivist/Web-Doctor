<?php
require "../settings/connection.php";

$user=$_POST['uname'];
$pass=$_POST['passwd'];

 $query="SELECT * FROM customer WHERE customname=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("s",$user);
    $stmt->execute();
        
        if($stmt->get_result()->num_rows>0){
            $row=$stmt->get_result()->fetch_assoc();
        if(password_verify($pass,$row['password'])){
            session_start();
            $_SESSION['id']=$row['id'];
            $_SESSION['username']=$row['customname'];
            // $_SESSION['email']=$row['email'];
            // $_SESSION['phone']=$row['phone'];
            // $_SESSION['address']=$row['address'];
            // $_SESSION['role']=$row['role'];
            header("Location: ../view/home.php");
        }else{
            header("Location: ../login/login.php?error=Invalid password");
        }
    }else{
        header("Location: ../login/login.php?error=Invalid username");
    }
