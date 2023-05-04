<?php
  include 'common.php';
  

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    // prepare the user-entered values for use in the query
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$hashed_password = md5($password); // hash the password using MD5

// create the SQL query
$sql = "SELECT id, email FROM users WHERE email = '$email' AND password = '$hashed_password'";


// execute the query and fetch the result
$result = mysqli_query($con, $sql);

// check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // user exists and credentials are correct
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    $user_email = $row['email'];
    $_SESSION['email'] =  $user_email;
    $_SESSION['user_id']=$user_id;
    header("location: product.php");
}
 else {
    // username and/or password do not match
    
        $error = "Your Login Name or Password is invalid";
        header("location: login.php?error=Your Login Name or Password is invalid");
}
  } 
  ?>