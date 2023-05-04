<?php
include 'common.php';

if($_SERVER['REQUEST_METHOD']=="POST")
{
  $email=mysqli_real_escape_string($con, $_POST['email']);
  $name=mysqli_real_escape_string($con,$_POST['name']);
  $password=mysqli_real_escape_string($con,$_POST['password']);
  if(strlen($password) < 0)
  {
    header('Location: signup.php?pass_error=password must have atleast 6 character');
  }
  $password=md5($password);
  $contact=mysqli_real_escape_string($con,$_POST['contact']);
  $city=mysqli_real_escape_string($con,$_POST['city']);
  $address=mysqli_real_escape_string($con,$_POST['address']);
  $sql="SELECT id from users WHERE email= ' $email ' ";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result) > 0)
  {
    // $error="Email address already exists";
    header('Location: signup.php?error=Email address already exists');
  }
  else{
    $query="INSERT INTO users (name,email,password,contact,city,address) VALUES ('$name','$email','$password','$contact','$city',' $address')";
    $query_run=mysqli_query($con,$query);
    if ($query_run) {
        $user_id = mysqli_insert_id($con);
        $_SESSION['user_id']=$user_id;
        $_SESSION['email']=$email;
        header('Location: product.php');
      } else {
        // $error= "Error: Unable to register user";
        header('Location: signup.php?Error= Unable to register user');
      }
   
  }

}


?>