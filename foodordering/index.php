<?php include("config-frontend/menu.php"); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            //code to display the category from the backend
            $sql="SELECT * FROM category WHERE active='Yes' AND featured='Yes' ";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
                    <a href="category-foods.php?category_id=<?php echo $id;?>">
                    <div class="box-3 float-container">
                        <img src="images/category/<?php echo $image_name; ?>" alt="$title" class="img-responsive img-curve" width="150px" height="400px">

                        <h3 class="float-text text-white"><?php echo $title;?></h3>
                    </div>
                    </a>
                    <?php
                }
            }else{
                echo "No Categories Found";
            }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            //getting food from database that rae featured and active
            $sql2="SELECT * FROM food WHERE active='Yes' AND featured='Yes' LIMIT 6";
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            if($count2>0){
                while($row2=mysqli_fetch_assoc($res2)){
                    $id=$row2['id'];
                    $title=$row2['title'];
                    $image_name=$row2['image'];
                    $description=$row2['description'];
                    $price=$row2['price'];

                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="images/food/<?php echo $image_name;?>" alt="<?php echo $title;?>" class="img-responsive img-curve" width="100px" height="100px">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price">$<?php echo $price;?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>


                    <?php
                }
            }else{
                echo "FOOD NOT AVAILABLE";
            }
            ?>
            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include("config-frontend/footer.php"); ?>