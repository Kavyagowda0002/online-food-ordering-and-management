<?php include("config-frontend/menu.php"); ?>
<?php
    if(isset($_GET['category_id'])){
        $category_id=$_GET['category_id'];

        //getting the category title based on id
        $sql="SELECT title FROM category WHERE id=$category_id";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $category_title=$row['title'];
    }else{
        echo "<script>
                    window.location='index.php';
          </script>";
    }

?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
           
            <h2 style="color: red;">Foods on <?php echo $category_title;?></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $sql1="SELECT * FROM food WHERE category_id=$category_id";
            $res1=mysqli_query($conn,$sql1);
            $count=mysqli_num_rows($res1);
            if($count>0){
                while($row1=mysqli_fetch_assoc($res1)){
                    $id=$row1['id'];
                    $title=$row1['title'];
                    $price=$row1['price'];
                    $description=$row1['description'];
                    $image_name=$row1['image'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" width="120px" height="120px">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price">$<?php echo $price;?></p>
                            <p class="food-detail">
                                <?php echo $description;?>
                            </p>
                            <br>

                            <a href="order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }else{
                echo "No food in the select category is available";
            }


            ?>
            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include("config-frontend/footer.php"); ?>