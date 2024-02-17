<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form login</title>
</head>
<body>
    <form action="" method="POST">
<h1 style="text-align: center">Please login </h1>
  <div style="text-align: center">  <input type="text" name="username" placeholder="username" value=""></br></br>
    <input type="text" name="password" placeholder="password" value=""></br></br>
    <input type="submit" name="login" value="login"></div></form>
</body>
</html>
<?php
include("connection.php");
if($_POST['login']){
    $username= $_POST['username'];
    $password = $_POST['password'];
 $sql = "SELECT * FROM form3 where Email='$username' && Pincode='$password'";
 $data = mysqli_query($conn , $sql);
 $num = mysqli_num_rows($data);
 if($num == 1){
    $_SESSION['username'] = $username;
     header('location:display.php');
 }
 else{
    echo "Login failed";
 }
}

?>