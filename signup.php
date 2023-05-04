<?php
include 'common.php';

// check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // redirect the user to the products page
    header('Location: products.php');
    exit; // make sure to exit after the redirect
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Signup | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
include 'header.php';
?>
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                        <h2>SIGN UP</h2>
                        <form  action="signup_script.php" method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="Name" name="name" minlength="3" maxlength="50"  required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="Email"  name="e-mail" required>
                            </div>
                            <div><?php echo $_GET['error']; ?></div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" minlength="6" required>
                            </div>
                            <div><?php echo $_GET['pass_error']; ?></div>
                            <div class="form-group">
                                <input type="password" id="confirm-password" name="confirm-password" required minlength="6" oninput="checkPasswordMatch()">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Contact" maxlength="10" size="10" name="contact" required>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="City" name="city" required>
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="Address" name="address" required>
                            </div>
                            <div><?php echo $_GET['Error']; ?></div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
               include 'footer.php';
        ?>

<script>
function checkPasswordMatch() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm-password").value;
  if (password != confirmPassword) {
    document.getElementById("confirm-password").setCustomValidity("Passwords do not match");
  } else {
    document.getElementById("confirm-password").setCustomValidity("");
  }
}
</script>
    </body>
</html>