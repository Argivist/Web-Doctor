<?php
require "../settings/connection.php";

session_start();
$email=$_POST['email'];
$pass=$_POST['passwd'];

 $query="SELECT * FROM people WHERE email=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("s",$user);
    $stmt->execute();
        $res=$stmt->get_result();
        if($res->num_rows>0){
            $row=$res->fetch_assoc();

            echo $row['CUSTOMID'];
            
        if(password_verify($pass,$row['PASSWORD'])){
            // `p_id` int(11) NOT NULL,
            // `user_id` bigint(20) NOT NULL,
            // `fname` varchar(50) NOT NULL,
            // `lname` varchar(50) NOT NULL,
            // `email` varchar(100) NOT NULL,
            // `tel` bigint(10) NOT NULL,
            // `address` varchar(100) NOT NULL,
            // `passwd` varchar(20) NOT NULL
            $_SESSION['id']=$row['CUSTOMID'];
            $_SESSION['username']=$row['user'];
            $_SESSION['fname']=$row['fname'];
            $_SESSION['lname']=$row['lname'];
            $_SESSION['email']=$row['email'];
            $_SESSION['phone']=$row['phone'];
            $_SESSION['address']=$row['address'];
        
            header("Location: ../view/home.php");
        }else{
            header("Location: ../login/login.php?error=Invalid password");
        }
    }else{
        header("Location: ../login/login.php?error=Invalid username");
    }
