<?php include("reusables/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE FOOD</h1>
        <br><br>
                        <!-- button t0 add categories-->
                        <a href="add-food.php" class="btn-primary">FOOD +</a>
                        <br>
                        <br>
                        <br>
                        <table class="tbl-full" >
                                <tr>
                                        <th>SN</th>
                                        <th>TITLE</th>
                                        <th>PRICE</th>
                                        <th>IMAGE</th>
                                        <th>FEATURED</th>
                                        <th>ACTIVE</th>
                                        <th>ACTIONS</th>
                                </tr>
                                <?php
                                $sql="SELECT * FROM food";
                                $res=mysqli_query($conn,$sql);
                                $count=mysqli_num_rows($res);
                                $sn=1;
                                if($count>0){
                                     while($row=mysqli_fetch_assoc($res)){
                                             $id=$row['id'];
                                             $title=$row['title'];
                                             $price=$row['price'];
                                             $image_name=$row['image'];
                                             $featured=$row['featured'];
                                             $active=$row['active'];
                                             ?>
                                             <tr>
                                                <td><?php echo $sn++;?></td>
                                                <td><?php echo $title;?></td>
                                                <td><?php echo $price;?></td>
                                                <td><img src="../images/food/<?php echo $image_name;?>" width="150px" height="120px">
                                                </td>
                                                <td><?php echo $featured;?></td>
                                                <td><?php echo $active;?></td>
                                                <td>
                                                        <a href="update-food.php?id=<?php echo $id;?>" class="btn-secondary" >UPDATE FOOD</a>
                                                        <a href="delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-ternary" >DELETE FOOD</a>
                                                </td>
                                             </tr>
                                             <?php
                                             
                                     }

                                }else{
                                        echo "<tr>NO FOOD TO DISPLAY</tr>";//if not displayimg properly add td inside tr and colspam of 7
                                }
                                ?>
                        </table>

    </div>
</div>
<?php include("reusables/footer.php")?>