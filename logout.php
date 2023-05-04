<?php 
include 'common.php';
if(!isset($_SESSION['email']))
{
    header('Location:index.php');
}
else{
    session_destroy();
}

?>