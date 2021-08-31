<?php include("reusables/menu.php");?>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql2="SELECT * FROM food WHERE id=$id";
    $res2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($res2);

    $title=$row2['title'];
    $description=$row2['description'];
    $price=$row2['price'];
    $current_image=$row2['image'];
    $current_category_id=$row2['category_id'];
    $featured=$row2['featured'];
    $active=$row2['active'];
}



?>
<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE FOOD </h1>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-manadmin">
                <tr>
                    <td>TITLE</td>
                    <td><input type="text" name="title" value="<?php echo $title;?>"></td>
                </tr>
                <tr>
                    <td>DESCRIPTION</td>
                    <td><textarea name="description" value="<?php echo $description;?>" cols="35" rows="6" ></textarea></td>
                </tr>
                <tr>
                    <td>PRICE</td>
                    <td><input type="number" name="price" value="<?php echo $price;?>"></td>
                </tr>
                <tr>
                    <td>CURRENT IMAGE</td>
                    <td><img src="../images/food/<?php echo $current_image;?>" width="150px" ></td>
                </tr>
                <tr>
                    <td>Select new image:</td>
                    <td>
                        <input type="file" name="image" required>
                    </td>
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
                                    $category_id=$row['id'];
                                    $category_title=$row['title'];
                                    ?>
                                    <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
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
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                        <input type="submit" name="submit" value="UPDATE FOOD" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $id=$_POST['id'];
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['$price'];
            $current_image=$_POST['$current_image'];
            $category=$_POST['category'];
            $featured=$_POST['featured'];
            $active=$_POST['active'];
            $image_name=$_FILES['image']['name'];
            $src=$_FILES['image']['tmp_name'];
            $dest="../images/food/".$image_name;
            $upload=move_uploaded_file($src,$dest);
            if($upload==false){
                echo "<script> alert('FAILED TO ADD IMAGE');
                    window.location='food.php';
                    </script>";
                    die();
            }
            $sql3="UPDATE INTO food SET
            title='$title',
            description='$description',
            price='$price',
            image='$image_name',
            category_id='$category',
            featured='$featured',
            active='$active' WHERE id=$id
            ";
            $res3=mysqli_query($conn,$sql3);

            if($res3==true){
                echo "<script> alert('food updated successfully');
                    window.location='food.php';
                    </script>";
            }else{
                echo "<script> alert('FAILED TO UPDATE FOOD');
                    window.location='food.php';
                    </script>";
            }


        }
        
        
        
        
        
        
        ?>
    </div>
</div>
        <?php include("reusables/footer.php")?>