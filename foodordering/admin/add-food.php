<?php include("reusables/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>ADD FOOD </h1>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-manadmin">
                <tr>
                    <td>TITLE</td>
                    <td><input type="text" name="title" placeholder="enter title"></td>
                </tr>
                <tr>
                    <td>DESCRIPTION</td>
                    <td><textarea name="description" placeholder="description..." cols="35" rows="6" ></textarea>
                </tr>
                <tr>
                    <td>PRICE</td>
                    <td><input type="number" name="price" placeholder="cost in dollars"></td>
                </tr>
                <tr>
                    <td>SELECT IMAGE</td>
                    <td><input type="file" name="image" required></td>
                </tr>
                <tr>
                    <td>CATEGORY</td>
                    <td>
                        <select name="category">
                            <?php
                            //code to dispaly the ctaegories from database
                            $sql="SELECT * from category WHERE active='Yes'";
                            $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                            if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $id=$row['id'];
                                    $title=$row['title'];
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                            }else{
                                ?>
                                <option value="0">NO CATEGORIES FOUND</option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>FEATURED</td>
                    <td><input type="radio" name="featured" value="Yes">YES
                    <input type="radio" name="featured" value="No">No</td>
                </tr>
                <tr>
                    <td>ACTIVE</td>
                    <td><input type="radio" name="active" value="Yes">YES
                    <input type="radio" name="active" value="No">No</td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="ADD FOOD" class="btn-secondary"></td>
                </tr>
            </table>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $category=$_POST['category'];
            //for featured button
            if(isset($_POST['featured'])){
                $featured=$_POST['featured'];
            }else{
                $featured="No";
            }
            //for active button
            if(isset($_POST['active'])){
                $active=$_POST['active'];
            }else{
                $active="No";
            }
            //upload the image 
                $image_name=$_FILES['image']['name'];
               
                    $src=$_FILES['image']['tmp_name'];
                    $dest="../images/food/".$image_name;
                    $upload=move_uploaded_file($src,$dest);
                    if($upload==false){
                        echo "<script> alert('FAILED TO ADD IMAGE ');
                        window.location='add-food.php';
                        </script>";
                    }
            $sql2="INSERT INTO food SET
            title='$title',
            description='$description',
            price=$price,
            image='$image_name',
            category_id=$category,
            featured='$featured',
            active='$active'
            ";
            $res2=mysqli_query($conn,$sql2);

            if($res2==true){
                echo "<script> alert('FOOD ADDED SUCCESSFULLY');
                    window.location='food.php';
                    </script>";
            }
            else{
                echo "<script> alert('FAILED TO ADD FOOD');
                    window.location='food.php';
                    </script>";
            }
        }


        ?>
    </div>
</div>




<?php include("reusables/footer.php")?>