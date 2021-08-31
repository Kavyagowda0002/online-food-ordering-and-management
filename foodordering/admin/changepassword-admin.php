<!-- menu-->
<?php include("reusables/menu.php");
?>
<!--main content-->
<div class="main-content">
    <div class="wrapper">
        <h1>CHANGE PASSWORD</h1>
        <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }

        ?>
        <br><br><hr>
        <form action="" method="POST">
            <table class="tbl-manadmin">
            <tr>
                <td>CURRENT PASSOWRD:</td>
                <td><input type="password" name="current_password" placeholder="current pass"></td>
            </tr>
            <tr>
                <td>NEW PASSOWRD:</td>
                <td><input type="password" name="new_password" placeholder="new pass"></td>
            </tr>
            <tr>
                <td>CONFIRM PASSOWRD</td>
                <td><input type="password" name="confirm_password" placeholder="confirm pass"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="sumit" value="CHANGE PASSWORD" class="btn-secondary">
                <input type="hidden" name="id" value="<?php echo $id?>"></td>
            </tr>

            </table>
        </form>
    </div>
</div>
<?php
//checking for validity pf passwords (authorization)
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);
    $sql="SELECT * FROM admin WHERE id=$id AND password='$current_password'";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $count=mysqli_num_rows($res);
        if($count==1){
            //user exits
            echo "userfound";

           /* if($newpassword==$confirmpassword){
                $sql2="UPDATE admin SET password='$newpassword' WHERE id=$id";
                $res2=mysqli_query($conn,$res2);
                if($res2==true){
                    echo "<script> alert('PASSWORD CHANGED SUCCESSFULLY!');
                        window.location='manage-admin.php';
                    </script>";
                }
            }else{
                echo "<script> alert('PASSWORD MISMATCH X');
                        window.location='changepassword-admin.php';
                    </script>";
            }
            */

        }else{
            //user does not exists
            echo "<script> alert('PASSWORD WAS NOT CHANGED. TRY AGAIN');
                        window.location='manage-admin.php';
                    </script>";
        }
    }
}
?>
<!-- footer-->
<?php include("reusables/footer.php");?>