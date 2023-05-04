<?php
include 'common.php';
if(!isset($_SESSION['email']))
{
    header('Location:index.php');
}

$item_ids=$_GET['id'];
$user_id=$_SESSION['user_id'];

$item_id_placeholders=implode(',',$item_ids);
$sql="UPDATE users_items SET status='confirmed' WHERE user_id='$user_id' AND item_id IN ($item_id_placeholders)";
$res=mysqli_query($con,$sql);
if($res)
{
   header('Location:success.html');
}
?>