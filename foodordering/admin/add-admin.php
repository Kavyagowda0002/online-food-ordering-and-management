<?php include("reusables/menu.php")
?>

<!-- main content-->
<div class="main-content">
    <div class="wrapper">
        <h1>ADD ADMIN</h1>
        
        <br>
        <form action="" method="POST">
            <table class="tbl-manadmin">
            <tr>
                <td>FULL NAME:</td>
                <td><input type="text" name="full_name" placeholder="enter your name"></td>
            </tr>
            <tr>
                <td>USERNAME:</td>
                <td><input type="text" name="user_name" placeholder="enter the user name"></td>
            </tr>
            <tr>
                <td>PASSWORD:</td>
                <td><input type="password" name="password" placeholder="enter your password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
            </table>
        </form>
    </div>
</div>

<?php include("reusables/footer.php")
?>
<?php 
 // form processing

 if(isset($_POST['submit'])){
    $fullname=$_POST["full_name"];
    $username=$_POST["user_name"];
    $password=md5($_POST["password"]);// md5 for password encrytpion.

    // sql query
    $sql="INSERT INTO admin SET
    full_name='$fullname',
    username='$username',
    password='$password'
    ";
    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));//filling data into databse

    if($res==TRUE){
        //echo "data inserted";
        echo "<script> alert('ADMIN ADDED SUCCESSFULLY!');
                        window.location='manage-admin.php';
              </script>";
    
     }else{
        echo "<script> alert('FAILED TO ADD ADMIN.TRY AGAIN');
        window.location='add-admin.php';
        </script>";
     }

 }
 ?>
