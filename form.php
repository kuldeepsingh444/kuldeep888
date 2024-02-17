
<?php
error_reporting();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form System</title>
</head>
<body>
    <h2> Registration Form</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <label> Name</label> <input type="text" name="fname" value=""></br></br>
    <label> Email</label> <input type="text" name="email" value=""></br></br>
    <label> mobileNo</label> <input type="text" name="mobile" value=""></br></br>
   <div><label> Select states <label>
    <select name= "state"> 
      <option>select</option>
      <option>Delhi</option>
        <option>Mumbai</option>
        <option>panjab</option>
    </Select></br></br>
    <label> Select city </label>
    <select name= "city"> 
      <option>select</option>
      <option>Newdelhi</option>
        <option>Amravati</option>
        <option>Chandigragh</option>
    </Select></br></br>
    <label>Address</label> <textarea name="address" value=""></textarea><br></br>
    <label>Pincode</label> <input type="text" name="pincode" value=""></br></br>
    <label>Choose File </label>
    <input type="file" name="image" value=""></br>
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>
<?php
include("connection.php");
if($_POST['submit']){
    $filename =  $_FILES["image"]["name"];
    $tempname =  $_FILES["image"]["tmp_name"];
    $folder = "images/" .$filename;
    //echo "$folder";
    move_uploaded_file($tempname , $folder);
    echo "<img src = '$folder' height='100px' width='100px'>";
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $city  = $_POST['city'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $sql = "INSERT INTO `form3`( `Name`, `Email`, `mobileNo`, `State`, `City`, `Address`, `Pincode`, `Image`) VALUES ('$fname','$email','$mobile','$state','$city','$address','$pincode','$folder')";
    $data = mysqli_query($conn, $sql);
    if($data){
        echo "record has been inserted";
    }
    else{
        echo "record has been not inserted";
    }
}
?>