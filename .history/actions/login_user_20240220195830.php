<?php
require "../settings/connection.php";

session_start();
$user=$_POST['uname'];
$pass=$_POST['passwd'];

 $query="SELECT * FROM customer WHERE customname=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("s",$user);
    $stmt->execute();
        $res=$stmt->get_result();
        if($res->num_rows>0){
            $row=$res->fetch_assoc();

            echo $row['CUSTOMID'];
            
        if(password_verify($pass,$row['PASSWORD'])){
        
            $_SESSION['id']=$row['CUSTOMID'];
            $_SESSION['username']=$row['user'];
            $_SESSION['fname']=$row['fname'];
            $_SESSION['lname']=$row['lname'];
            $_SESSION['email']=$row['email'];
            $_SESSION['phone']=$row['phone'];
            $_SESSION['address']=$row['address'];
        }
    //         header("Location: ../view/home.php");
    //     }else{
    //         header("Location: ../login/login.php?error=Invalid password");
    //     }
    // }else{
    //     header("Location: ../login/login.php?error=Invalid username");
    // }
