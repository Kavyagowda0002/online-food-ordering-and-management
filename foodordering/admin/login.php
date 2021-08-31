
<?php include('../config/configuration.php');
?>
<html>
    <head>
        <title>login foodordering</title>
        <link rel="stylesheet" href="../css/admin.css">
        <style>
            .login{
               margin: 5% auto;
               height: 50%; 
               padding: 2%;
               text-align: center;
                font-weight: bold;
                width: 30%;
                border: 1px solid black; 
                }
        </style>
    </head>
    <body>
        <div class="login">
            <h1>Login</h1><br><br>
            <form action="" method="POST">
                USERNAME:
                <br>
                <input type="text" name="username" placeholder="enter username" required><br><br>
                PASSWORD:<br>
                <input type="password" name="password" placeholder="enter password" required><br><br>
                <input type="submit" name="submit" value="LOGIN" class="btn-secondary"><br><br>
            </form>
            <p>developed by <a href="#">Kavya Gowda</a></p>
        </div>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $res=mysqli_query($conn,$sql);

    $count=mysqli_num_rows($res);

    if($count==1){
        echo "<script> alert('LOGIN SUCCESSFULL');
        window.location='index.php';
        </script>";
        $_SESSION['user']=$username;//to check whether the user is loggin in or not, when logged out it unsets because we have used session_destroy

    }else{
        echo "<script> alert('FAILED TO LOGIN. USERNAME PASSWORD DID NOT MATCH');
        window.location='login.php';
        </script>";
    }
}



?>