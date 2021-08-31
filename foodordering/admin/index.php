<!-- meu-->
<?php include("reusables/menu.php");
?>


        <!-- main content-->
        <div class="main-content">
        <div class="wrapper">
               <h1>DASHBOARD</h1>
               <div class="col-4 text-centre">
               <?php
                       $sql1="SELECT * FROM category";
                       $res1=mysqli_query($conn,$sql1);
                       $count1=mysqli_num_rows($res1);

                        ?>
                   <h1>
                       <?php echo $count1;?>
                   </h1>
                   <br>
                   CATEGORIES
               </div>
               <div class="col-4 text-centre">
               <?php
                       $sql2="SELECT * FROM food";
                       $res2=mysqli_query($conn,$sql2);
                       $count2=mysqli_num_rows($res2);

                        ?>
                   <h1><?php echo $count2;?></h1>
                   <br>
                   FOODS
               </div>
               <div class="col-4 text-centre">
               <?php
                       $sql3="SELECT * FROM tbl_order";
                       $res3=mysqli_query($conn,$sql3);
                       $count3=mysqli_num_rows($res3);

                        ?>
                   <h1><?php echo $count3;?></h1>
                   <br>
                   ORDERS
               </div>
               <div class="col-4 text-centre">
                   <?php
                   $sql4="SELECT SUM(total) AS Total FROM tbl_order";
                   $res4=mysqli_query($conn,$sql4);
                   $row=mysqli_fetch_assoc($res4);
                    $sum=$row['Total'];
                   ?>
                   <h1>$<?php echo $sum;?></h1>
                   <br>
                   REVENUE
               </div>
               <div class="clearfix"></div>
           </div>
        </div>

<!-- footer-->
<?php include("reusables/footer.php");?>