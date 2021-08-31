<?php include("config-frontend/menu.php"); ?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            //display all the categories that are active
            $sql="SELECT * FROM category WHERE active='Yes'";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];
                    $title=$rows['title'];
                    $image_name=$rows['image_name'];
                
                ?>
                 <a href="category-foods.php">
                <div class="box-3 float-container">
                    <img src="images/category/<?php echo $image_name;?>"  alt="Pizza" class="img-responsive img-curve" width="150px" height="300px">

                    <h3 class="float-text text-white"><?php echo $title;?></h3>
                </div>
                </a>

                <?php
                }
            } else{
                echo "CATEGORY NOT AVAILABLE";
            }

            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include("config-frontend/footer.php"); ?>