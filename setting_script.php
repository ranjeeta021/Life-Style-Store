<?php
include 'common.php';
if(!isset($_SESSION['email']))
{
    header('Location:index.php');
}
$email=$_SESSION['email'];
$old_password=mysqli_real_escape_string($con,$_post['old-password']);
$new_password=mysqli_real_escape_string($con,$_post['password']);
$retype_new_password=mysqli_real_escape_string($con,$_post['password1']);


if (strlen($new_password) !== strlen($retype_new_password)) {
    // echo '<script>alert("New password and retype new password fields must have the same length");</script>';
    header('Location:settings.php?pass_error=password doest not match');
} else {
    $hashed_password = md5($new_password);
    $hashed_password2=md5($old_password);
    $sql="SELECT id from users where password= $hashed_password2";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)!=0)
    {
      $query="UPDATE users set password=$hashed_password where email=$email";
    }
    else{
        header('Location:settings.php?pass_error=unable to set password');
    }
}

?>
