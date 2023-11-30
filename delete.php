<?php
include('config.php');
$urutan = $_GET['id'];
$queri = "DELETE from pengunjung where id='$urutan'";
mysqli_query($conn, $queri);
header("Location:admin.php");
?>