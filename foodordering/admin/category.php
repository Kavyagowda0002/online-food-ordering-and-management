<?php include("reusables/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE CATEGORY</h1>
        <br><br>
                        <!-- button t0 add categories-->
                        <a href="add-category.php" class="btn-primary">CATEGORY +</a>
                        <br>
                        <br>
                        <br>
                        <table class="tbl-full" >
                                <tr>
                                        <th>SN</th>
                                        <th>TITLE</th>
                                        <th>IMAGE</th>
                                        <th>FEATURED</th>
                                        <th>ACTIVE</th>
                                        <th>ACTIONS</th>
                                </tr>
                                <?php
                                $sql="SELECT * FROM category";
                                $res=mysqli_query($conn,$sql);
                                $count=mysqli_num_rows($res);
                                $sn=1;
                                if($count>=1){
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                                $id=$row['id'];
                                                $title=$row['title'];
                                                $image_name=$row['image_name'];
                                                $featured=$row['featured'];
                                                $active=$row['active'];
                                                ?>

                                        <tr>
                                                <td><?php echo $sn++;?></td>
                                                <td><?php echo $title;?> </td>

                                                <td>
                                                        <?php 
                                                                if($image_name!=""){
                                                                        ?>
                                                                        <img src="../images/category/<?php echo $image_name; ?>" width="100px">
                                                                        <?php

                                                                }else{
                                                                        echo "NO IMAGE AVAILABLE";
                                                                }
                                                        ?>
                                                </td>

                                                <td><?php echo $featured;?></td>
                                                <td><?php echo $active;?></td>
                                                <td>
                                                        <a href="update-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-secondary" >UPDATE CATEGORY</a>
                                                        <a href="delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-ternary" >DELETE CATEGORY</a>
                                                </td>
                                        </tr>
                                        <?php

                                        }
                                        
                                }else{
                                ?>

                                <tr>
                                        <td colspan="6"><div class="eror">NO CATEGORIES FOUND</div></td>
                                </tr>
                                <?php
                                }
                                
                                ?>
                                
                        </table>

    </div>
</div>
                        
<?php include("reusables/footer.php");?>