<?php
require "../settings/connection.php";

$user=$_POST['uname'];
$pass=$_POST['passwd'];

 $query="SELECT * FROM customer WHERE customname=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("s",$user);
    $stmt->execute();
        $res=$stmt->get_result();
        if($res->num_rows>0){
            $row=$res->fetch_assoc();
            echo $row['PASSWORD'];
            echo password_hash($pass,PASSWORD_DEFAULT);
            
        if(password_hash($pass,PASSWORD_DEFAULT)==$row['password']){
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
