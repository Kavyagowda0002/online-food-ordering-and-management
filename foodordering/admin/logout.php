<?php
include("../config/configuration.php");
session_destroy();
echo "<script> alert('LOGGED OUT SUCCESSFULLY');
        window.location='login.php';
        </script>";
?>