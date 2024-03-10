<?php
session_start();

function login_user(){
    if (isset($_SESSION['userID'])) 
    {  
        return true;
    }
    else{
        header( "Location: ../login/login.php" );
        die();
    }
}
?>