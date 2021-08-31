<?php include("reusables/menu.php");?>
<!--main content-->
<div class="main-content">
    <div class="wrapper">
        <h1>ADD CATEGORY</h1><br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-manadmin">
                <tr>
                    <td>TITLE:</td>
                    <td><input type="text" name="title" placeholder="category title" required></td>
                </tr>
                <tr>
                    <td>SELECT IMAGE</td>
                    <td><input type="file" name="image" required></td>
                </tr>

                <tr>
                    <td>FEATURED:</td>
                    <td><input type="radio" name="featured" value="Yes">YES
                    <input type="radio" name="featured" value="No">NO</td>
                </tr>
                <tr>
                    <td>ACTIVE:</td>
                    <td><input type="radio" name="active" value="Yes">YES
                    <input type="radio" name="active" value="No">NO</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Add Category" class="btn-secondary"></td>
                </tr>
                
            </table>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $title=$_POST['title'];
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

            //image processing
            //print_r($_FILES['image']); //to chck file upload is working or not
            //die();
           
            if(isset($_FILES['image']['name'])){
                $image_name=$_FILES['image']['name'];
                //auto rename of image to avoid rdundancy
                
                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/category/".$image_name;

                $upload=move_uploaded_file($source_path,$destination_path);

                if($upload==false){
                    echo "<script> alert('FAILED TO UPLOAD IMAGE');
                    window.location='add-category.php';
                    </script>";
                    die();
                }
                
            }else{
                $image_name="";
            }


            //sql query
            $sql="INSERT INTO category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'";
            //connection
            $res=mysqli_query($conn,$sql);

            //checking the query
            if($res==true){
                echo "<script> alert('CATEGORY ADDED SUCCESSFULLY');
                    window.location='category.php';
                    </script>";
            }else{
                echo "<script> alert('FAILED TO ADD CATGORY. TRY AGAIN');
                window.location='add-category.php';
                </script>";
            }
        }       
?>
    </div>

</div>


<?php include("reusables/footer.php")?>