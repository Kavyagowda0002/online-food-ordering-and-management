<?php include("../config/configuration.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="DELETE FROM category where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        echo "<script>  alert('CATEGORY DELETED SUCCESSFULLY');
                    window.location='category.php';
        </script>";
    }else{
        echo "<script>  alert('FAILED TO DELETE CATEGORY. TRY AGAIN');
                    window.location='category.php';
        </script>";
    }

}else{
    echo "<script>  alert('FAILED TO DELETE CATEGORY');
                    window.location='delete-category.php';
        </script>";
}
    
?>