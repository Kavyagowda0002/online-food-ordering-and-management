

<?php
//session

session_start();
define('SITEURL','http://localhost/foodordering/admin/index.php');
$username1="root";
$password1="";
$db1="food-order";
$conn=mysqli_connect('localhost',$username1,$password1) or die(mysqli_error($conn));
$db=mysqli_select_db($conn,$db1) or die(mysqli_error($conn));
?>