<?php
require "../settings/connection.php";

session_start();
$email=$_POST['email'];
$pass=$_POST['passwd'];

if($email=="admin"&&$pass=="admin"){
    $_SESSION['id']=0;
    $_SESSION['username']="Admin";
    header("Location: ../view/home.php");
}
 $query="SELECT * FROM people WHERE email=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("s",$email);
    $stmt->execute();
        $res=$stmt->get_result();
        if($res->num_rows>0){
            $row=$res->fetch_assoc();

        
            
        if(password_verify($pass,$row['passwd'])){
            
            $_SESSION['id']=$row['p_id'];
            $_SESSION['username']=$row['user'];
            $_SESSION['fname']=$row['fname'];
            $_SESSION['lname']=$row['lname'];
            $_SESSION['email']=$row['email'];
            $_SESSION['phone']=$row['phone'];
            $_SESSION['address']=$row['address'];
            $_SESSION['username_p']="Pharmacy";
            header("Location: ../view/home.php");
        }else{
            header("Location: ../login/login.php?error=Invalid password");
        }
    }else{
        header("Location: ../login/login.php?error=Invalid username");
    }
