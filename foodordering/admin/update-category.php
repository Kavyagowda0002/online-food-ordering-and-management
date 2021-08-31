<?php include("reusables/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE CATEGORY</h1>
        <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $sql="SELECT * FROM category WHERE id=$id";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count==1){
                $row=mysqli_fetch_assoc($res);
                $title=$row['title'];
                $current_image=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];
            }
            else{
                echo "<script> alert('CATGORY NOT FOUND');
                window.location='category.php';
                </script>";
            }

        }else{
            echo "<script> 
                window.location='category.php';
                </script>";
        }

        ?>




        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-manadmin">
            <tr>
                    <td>TITLE:</td>
                    <td><input type="text" name="title" placeholder="<?php echo $title;?>" required></td>
                </tr>
                <tr>
                    <td>CURRENT IMAGE</td>
                    <td><!-- currnet image will be displayed here-->
                    <?php
                    if($current_image!=""){
                        ?>
                        <img src="../images/category/<?php echo $current_image;?>" width="150px">
                        <?php
                    }else{
                        echo "image not avilable";
                    }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>NEW IMAGE</td>
                    <td><input type="file" name="image" required></td>
                </tr>

                <tr>
                    <td>FEATURED:</td>
                    <td><input <?php if($featured=="Yes"){ echo "checked";} ?> type="radio" name="featured" value="Yes">YES
                    <input  <?php if($featured=="No"){ echo "checked";} ?>type="radio" name="featured" value="No">NO</td>
                </tr>
                <tr>
                    <td>ACTIVE:</td>
                    <td><input <?php if($active=="Yes"){ echo "checked";} ?> type="radio" name="active" value="Yes">YES
                    <input  <?php if($active=="No"){ echo "checked";} ?> type="radio" name="active" value="No">NO</td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                    <input type="hidden" name="id" value="<?php echo $id;?>">   
                    <input type="submit" name="submit" value=" UPDATE CATEGORY" class="btn-secondary"></td>
                </tr>
            </table>

        </form>
        
    </div>
</div>
<!--
    <?php
            if(isset($_POST['submit']));
            {
                $id=$_POST['id'];
                $title=$_POST['title'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];
                //update image selected
                $image_name=$_FILES['image']['name'];


                // query
                $sql2="UPDATE category SET
                title='$title',
                image_name=$image_name,
                featured='$featured',
                active='$active'
                WHERE id=$id
                ";
                $res2=mysqli_query($conn,$sql2);
                if($res2==true){
                    echo "<script> alert('CATEGORY UPDATED SUCCESFULLY');
                    window.location='category.php';
                    </script>";
                }
                else{
                    echo "<script> alert('FAILED TO UPDATE CATEGORY');
                    window.location='category.php';
                    </script>";
                }
            }
        ?>
        -->


<?php include("reusables/footer.php");?>