<?php include("config-frontend/menu.php"); ?>
<style>


</style>

<?php
if(isset($_GET['food_id'])){
    $id=$_GET['food_id'];
    $sql="SELECT * FROM food WHERE id=$id";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
        //we have data so retrueve values from database to fill up in order form
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $price=$row['price'];
        $image_name=$row['image'];
    }else{
        echo "<script>
        window.location='index.php';
        </script>";
    }
}else{
    echo "<script>
    window.location='index.php';
    </script>";
}




?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center ">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="images/food/<?php echo $image_name;?>" alt="$title" class="img-responsive img-curve" width="100px" height="120px">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="food" value="<?php echo $title;?>">

                        <p class="food-price">$<?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Kavya Gowda" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9900xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. Kavyagowda0002@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include("config-frontend/footer.php"); ?>

    <?php
    //if form is submitted
    if(isset($_POST['submit'])){
        $food=$_POST['food'];
        $price=$_POST['price'];
        $qty=$_POST['qty'];
        $total=$qty*$price;
        $ord_date=date("y-m-d h:i:sa");
        $status="ordered";// ordered, on deleivery,Delivered ,cancelled
        $cust_name=$_POST['full-name'];
        $cust_contact=$_POST['contact'];
        $cust_email=$_POST['email'];
        $cust_addr=$_POST['address'];

        //save the order in the data\base
        $sql2="INSERT INTO tbl_order SET 
        food='$food',
        price='$price',
        quantity=$qty,
        total=$total,
        ord_date='$ord_date',
        status='$status',
        cust_name='$cust_name',
        cust_contact='$cust_contact',
        cust_email='$cust_email',
        cust_address='$cust_addr'
        ";
        $res2=mysqli_query($conn,$sql2);
        if($res2==true){
            echo "<script> alert('ORDER PLACED SUCCESSFULLY');
                    window.location='index.php';
                    </script>";
        }else{
            echo "<script> alert('FAILED TO PLACE THE ORDER. PLEASE TRY AGAIN');
                    window.location='index.php';
                    </script>";
        }
    }
    
    
    
    
    
    
    
    
    ?>