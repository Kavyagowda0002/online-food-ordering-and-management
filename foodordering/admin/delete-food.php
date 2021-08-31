<?php
include("../config/configuration.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];
    $path="../images/food/".$image_name;
    $remove=unlink($path);//remove image from the folder
    if($remove==false){
        echo "<script> alert('FAILED TO REMOVE IMAGE FILE');
        window.location='food.php';
        </script>";
        die();
    }
    $sql="DELETE FROM food WHERE id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        echo "<script> alert('FOOD DELETED SUCCESSFULLY');
        window.location='food.php';
        </script>";
    }else{
        echo "<script> alert('FAILED TO DELETE FOOD');
        window.location='food.php';
        </script>";
    }
}else{
    echo "<script> alert('UNAUTHORIZED ACCESS');
    window.location='food.php';
    </script>";
}
?>