<?php include("reusables/menu.php");
?>
<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE ORDER</h1>
        <br><br><br><hr>
        <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_order WHERE id=$id";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($res);
            $food=$row['food'];
            $qty=$row['quantity'];
            $status=$row['status'];
            $price=$row['price'];

        }else{
            echo "<script> 
            window.location='order.php';
            </script>";
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-manadmin">
                <tr>
                    <td>FOOD MENU</td>
                    <td><b>
                        <?php
                        echo $food;
                        ?>
                    </b></td>
                </tr>
                <tr>
                    <td>QUANTITY</td>
                    <td><input type="number" name="quantity" value="<?php echo $qty;?>"></td>
                </tr>
                <tr>
                    <td>STATUS</td>
                    <td>
                        <select name="status">
                            <option  <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">ORDERED</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">ON DELIVERY</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">DELIVERED</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">CANCELLED</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <input type="submit" name="submit" value="UPDATE ORDER" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
        <?php
        if(isset($_POST['submit'])){
            $id=$_POST['id'];
            $status=$_POST['status'];
            $quantity=$_POST['quantity'];
            $price=$_POST['price'];
            $total=$quantity*$price;
            $sql2="UPDATE tbl_food SET
            quantity=$quantity,
            total=$total,
            status='$status'
            ";
            $res2=mysqli_query($conn,$sql2);
            if($res2==true){
                echo "<script> alert('UPDATION WAS SUCCESSFULL!');
                window.location='order.php';
            </script>";
            }else{
                echo "<script> alert('UPDATION WAS NOT SUCCESSFULL!');
                window.location='order.php';
                </script>";
            }

        }
        
        ?>
    </div>
</div>





















<?php include("reusables/footer.php");?>
