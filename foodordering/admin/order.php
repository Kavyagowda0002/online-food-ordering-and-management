<?php include("reusables/menu.php");?>

<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE ORDER</h1>
        <br><br>

                        <table class="tbl-full">
                                <tr>
                                        <th>SN</th>
                                        <th>FOOD</th>
                                        <th>PRICE</th>
                                        <th>QUANTITY</th>
                                        <th>TOTAL</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                        <th>NAME</th>
                                        <th>CONTACT</th>
                                        <th>EMAIL</th>
                                        <th>ADDRESS</th>
                                        <th>ACTION</th>
                                </tr>
                                <?php
                                $sql="SELECT * FROM tbl_order";
                                $res=mysqli_query($conn,$sql);
                                $count=mysqli_num_rows($res);
                                $sn=1;
                                if($count>0){
                                        while($row=mysqli_fetch_assoc($res)){
                                                $id=$row['id'];
                                                $food=$row['food'];
                                                $price=$row['price'];
                                                $qty=$row['quantity'];
                                                $total=$row['total'];
                                                $order_date=$row['ord_date'];
                                                $status=$row['status'];
                                                $customer_name=$row['cust_name'];
                                                $customer_contact=$row['cust_contact'];
                                                $customer_email=$row['cust_email'];
                                                $customer_address=$row['cust_address'];
                                                ?>
                                                <tr>
                                                        <td><?php echo $sn++;?></td>
                                                        <td><?php echo $food;?></td>
                                                        <td><?php echo $price;?> </td>
                                                        <td><?php echo $qty;?></td>
                                                        <td><?php echo $total;?></td>
                                                        <td><?php echo $order_date;?></td>
                                                        <td><?php echo $status;?></td>
                                                        <td><?php echo $customer_name;?></td>
                                                        <td><?php echo $customer_contact;?></td>
                                                        <td><?php echo $customer_email;?></td>
                                                        <td><?php echo $customer_address;?></td>
                                                        <td>
                                                                <a href="update-order.php?id=<?php echo $id;?>" class="btn-secondary" >UPDATE ORDER</a>
                                                        </td>
                                </tr>



                                                <?php
                                        }

                                }else{
                                        echo "<tr><td'>Orders not available</td></tr>";
                                }

                                
                                ?>
                                
                                
                        </table>

    </div>
</div>
<?php include("reusables/footer.php")?>