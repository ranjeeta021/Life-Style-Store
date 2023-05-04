<?php
include 'common.php';
$user_id=$_SESSION['user_id'];
$id=$_GET['id'];
$query="INSERT INTO users_items(user_id, item_id, status) VALUES('$user_id', '$item_id', 'Added to cart')";
$res=mysqli_query($con,$query);
header('Location:product.php');
?>