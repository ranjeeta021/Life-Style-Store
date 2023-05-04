<?php


function check_if_added_to_cart($item_id) {
    include 'common.php';
    $user_id=$_SESSION['user_id'];
  // check if cart array exists in session
 $sql="SELECT * FROM user_items WHERE item_id='$item_id' AND user_id ='$user_id' and 
 status='Added to cart' ";
 $res=mysqli_query($con,$sql);
 if(mysqli_num_rows($res) > 0)
 {
    return 1;
 }
 else{
    return 0; // item not found in cart
 }
  
}
?>
