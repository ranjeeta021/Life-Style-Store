<?php
include 'common.php';
if(!isset($_SESSION['email'])){
    header('Location: login.php');
}
$user_id=$_SESSION['user_id'];
$sql="SELECT users_items.*, products.* from users_items INNER JOIN products on users_items.item_id=products.product_id where users_items.user_id='$user_id'";
$res=mysqli_query($con,$sql);
$sum=0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid" id="content">
           <?php
             include 'header.php';
             

           ?>
           
           <?php
               if(msqli_num_rows($res) == 0)
             
               echo '<h3>ADD ITEMS TO CART </h3>'
                

               ?>
           
            <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
							<th>image</th>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                                <?php
                                 $i=0;
                                $id=array();
                                 while($row=mysqli_fetch_array($res)){
                                    $sum=$sum+ $row['price'];
                                    $id[i]=$row['item_id'];
                                    $i++;

                                ?>
                                <tr>
                               <td><img src="img/<?php echo $row['product_id']; ?>.jpg" width="50" height="50"></td>
                               <td><?php echo $row['product_id']; ?></td>
                               <td><?php echo $row['product_name']; ?></td>
                               <td><?php echo $row['price']; ?></td>
                               <td><a href='cart-remove.php?id={<?php echo $row['item_id']; ?>}' 
                                    class='remove_item_link'> Remove</a></td>

                            </tr>
                                 <?php } ?>
                            <tr>
                                <td></td><td>Total</td><td>Rs <?php echo $sum; ?> </td><td><a href='success.php?id=$id' class='btn btn-primary'>Confirm Order</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       <?php
         include 'footer.php'
       ?>
    </body>
</html>