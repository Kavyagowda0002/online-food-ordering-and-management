<?php

include("../config/configuration.php");
//1.get the id of admin to be deleted
 $id=$_GET['id'];
//2.form the query
$sql="DELETE FROM admin WHERE ID=$id";
//3. execute the query
$res=mysqli_query($conn,$sql);
//4.redirect to required page
if($res==TRUE){
        echo "<script> alert('ADMIN DELETED SUCCESSFULLY!');
                        window.location='manage-admin.php';
              </script>";
}
else{
    echo "<script> alert('FAILED TO DELETE ADMIN. TRY AGAIN');
                    window.location='manage-admin.php';
          </script>";
}



?>