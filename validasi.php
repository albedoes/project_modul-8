<?php
include 'config.php';
session_start();

$username = $_POST['tusername'];
$password = md5($_POST['tpasswd']);


$query = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";


$result = mysqli_query($conn,$query ) or die('Error making query');
$affected_rows = mysqli_num_rows($result);
$data = mysqli_fetch_row($result);



if($affected_rows == 1) {
    $_SESSION['sadmin_username']=$username;
    header( 'location: admin.php');

}
else {
    header( 'location: login.php');
}
?>