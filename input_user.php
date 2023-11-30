<?php
if (isset($_POST['upload'])) {
  include 'config.php';

  $username= trim($_POST['tusername']);
  $password = md5(trim($_POST['tpassword']));
  if (empty($username) || empty($password)) {
    $message= "Data Not Valid";
  } else {

    $kueri = "select * from pengguna where username='$username'";
    $hasil = mysqli_query($conn, $kueri) or die('Error, query failed. ' . mysqli_error($conn));
    $result = mysqli_fetch_array($hasil);
    //jika ada username yang sama
    if ($result != 0) {
      $message = "There is same username ";
    } else {


        $query = "insert into pengguna (username,password)" . 
          "VALUES ('$username','$password')";

        mysqli_query($conn, $query) or die('Error, query failed' . mysqli_error($conn));
        mysqli_close($conn);

        echo "Add User Administrator '$username' SUCCESS";
        exit; 

    }
  }
}
?>

<html>
<head>
    <title>Penambahan User Admin</title>
</head>
<body>
  <table width="90%" border="0" align="center" cellpading="0" cellspacing="0" class="content">
    <tr> 
      <td> 
        <center> 
          <font color="#FF0000"> 
            <?php if (isset($message)) {
              echo $message;
            } ?>
          </font>
        </center>
      </td>
    </tr>
  </table>
  <form action="<?php $PHP_SELF ?>" method="post" name="uploadform" id="uploadform"> 
    <table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" class="content"> 
      <tr bgcolor="#FFDFAA"> 
        <td colspan="3"> 
          <div align="center"><strong>Add User Administrator </strong></div>
        </td>
      </tr>
      <tr>
         <td width="26%"><strong>Username</strong></td>
         <td width="2%">:</td>
         <td width="72%"><input name="tusername" type="text" id="tusername" size="20" maxlength="20">
           <span class="style2">*</span>
         </td>
      </tr>
      <tr> 
         <td><strong>Password</strong></td>
         <td>:</td>
         <td><input name="tpassword" type="password" id="tpassword" size="20" maxlength="20">
           <span class="style2">*</span>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="upload" type="submit" class="box" id="upload" value=" submit"></td>
      </tr>
      <tr>
        <td><a href="index.php">Kembali ke index</a></td>
      </tr>
    </table>
  </form>
</body>
</html>