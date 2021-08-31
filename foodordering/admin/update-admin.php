<?php include("reusables/menu.php");
?>
<!-- main content-->
<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE ADMIN</h1>
        <br><br>
        <?php
        $id=$_GET['id'];// id of selected admin
        $sql="SELECT * FROM admin WHERE id=$id";
        $res=mysqli_query($conn,$sql);

        if($res==TRUE){
           $count=mysqli_num_rows($res);
           if($count==1){
                echo "admin available";
                $row=mysqli_fetch_assoc($res);
                $full_name=$row['full_name'];
                $username=$row['username'];
           }
        }else{
            echo "<script> alert('UPDATION WAS NOT SUCCESSFULLY!');
                        window.location='update-admin.php';
              </script>";
        }
        
        ?>
        <form action="" method="POST">
            <table class="tbl-manadmin">
            <tr>
                <td>FULL NAME:</td>
                <td><input type="text" name="full_name" value="<?php echo $full_name?>"></td>
            </tr>
            <tr>
                <td>USERNAME:</td>
                <td><input type="text" name="username" value="<?php echo $username?>"></td>
            </tr>
            <tr colspan="2" >
                <td>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" value="UPDATE ADMIN" class="btn-secondary">
                </td>
            </tr>

            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $sql="UPDATE admin SET 
        full_name='$full_name',
        username='$username'
        WHERE id=$id
         ";
         $res=mysqli_query($conn,$sql);
         if($res==TRUE){
            echo "<script> alert('ADMIN UPDATED SUCCESSFULLY!');
            window.location='manage-admin.php';
            </script>";
         }
         else{
            echo "<script> alert('ERROR. TRY AGAIN');
            window.location='update-admin.php';
            </script>";
         }
        
    }
?>








<!-- footer-->
<?php include("reusables/footer.php");?>