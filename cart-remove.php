<?php
include 'common.php';
$user_id=$_SESSION['user_id'];

$Item_id=$_GET['id'];

$sql="DELETE From users_items Where User_id='$user_id' and item_id='$item_id'";
$res=mysqli_query($con,$sql);
if($res){
    header('Location:cart.php');
}

?>