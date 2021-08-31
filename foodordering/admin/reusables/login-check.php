<?php

if(!isset($_SESSION['user']))//IF user session is not set ,means logges out, redirect the userr to login page
{
    echo "<script> alert('Please login to access admin panel');
        window.location='login.php';
        </script>";
}




?>