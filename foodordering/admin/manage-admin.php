<!-- menu-->
<?php include("reusables/menu.php");
?>

        <!-- main content-->
        <div class="main-content">
                <div class="wrapper">
                        <h1>MANAGE ADMIN</h1>
                        <br><br>
                        <br><br><br>
                        <!-- button t add admins-->
                        <a href="add-admin.php" class="btn-primary">ADMIN +</a>
                        <br>
                        <br>
                        <br>
                        <table class="tbl-full" >
                                <tr>
                                        <th>SN</th>
                                        <th>USERNAME</th>
                                        <th>FULL NAME</th>
                                        <th>ACTIONS</th>
                                </tr>
                                <?php
                                $sql="SELECT * FROM admin";
                                $res=mysqli_query($conn,$sql);
                                if($res==TRUE){
                                        $count=mysqli_num_rows($res);
                                        $sn=1;//creating a varible for serial no.
                                        if($count>0){
                                                while($rows=mysqli_fetch_assoc($res)){
                                                  //while loop will run as long as there is data in the database
                                                  $id=$rows['id'];
                                                  $full_name=$rows['full_name'];
                                                  $username=$rows['username'];
                                ?>
                                <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $username;?></td>
                                        <td><?php echo $full_name;?></td>
                                        <td>
                                                <a href="changepassword-admin.php?id=<?php echo $id; ?>" class="btn-secondary" >CHANGE PASSWORD</a>
                                                <a href="update-admin.php?id=<?php echo $id; ?>" class="btn-secondary" >UPDATE ADMIN</a>
                                                <a href="delete-admin.php?id=<?php echo $id; ?>" class="btn-ternary" >DELETE ADMIN</a>
                                        </td>
                                </tr>


                                                  <?php
                                                }
                                        }
                                }
                                ?>
                        </table>
                </div>
        </div>
<!-- footer-->
<?php include("reusables/footer.php");?>