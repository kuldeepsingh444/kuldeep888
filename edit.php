<?php

include("connection.php");
// session_start();
// $user = $_SESSION['username'];
// if($user){
//     echo "";
// }
// else{
//     echo header("location:login.php");
// }
$id =  $_GET['id'];
$sql = "SELECT * FROM form3 where ID='$id'";
$data = mysqli_query($conn , $sql);
$num  = mysqli_num_rows($data);
$row = mysqli_fetch_assoc($data);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form System</title>
</head>
<body>
<form action="" method="POST">
    <label> Name</label> <input type="text" name="fname" value="<?php echo $row['Name'];?>"></br></br>
    <label> Email</label> <input type="text" name="email" value="<?php echo $row['Email'];?>"></br></br>
    <label> MobileNO</label> <input type="text" name="mobile" value="<?php echo $row['mobileNo'];?>"></br></br>
   <label> Select States <label>
    <select name= "state"> 
      <option value="">select</option>
      <option value = ""
      <?php
      if($row['State']=="Delhi"){
        echo "selected";
      }
      ?>
      >Delhi</option>
        <option value=""
        <?php
        if($row['State']=="Mumbai"){
            echo "selected";
        }
        ?>
        >Mumbai</option>
        <option value=""
        <?php
        if($row['State']=="Panjab"){
            echo "selected";
        }
        ?>
        >Panjab</option>
    </Select></br></br>

    <label> Select City <label>
    <select name= "city"> 
      <option value="">select</option>
      <option value = ""
      <?php
      if($row['City']=="Newdelhi"){
        echo "selected";
      }
      ?>
      >Newdelhi</option>
        <option value=""
        <?php
        if($row['City']=="Amravati"){
            echo "selected";
        }
        ?>
        >Amravati</option>
        <option value=""
        <?php
        if($row['City']=="Chandigragh"){
            echo "selected";
        }
        ?>
        >Chandigragh</option>
    </Select></br></br>

    <label>Address</label> <textarea name="address"><?php echo $row['Address'];?></textarea><br></br>
    <label>Pincode</label> <input type="text" name="pincode" value="<?php echo $row['Pincode'];?>"></br></br>
    <label>Choose File </label>
    <input type="file" name="image"></br>
    <input type="hidden" name= "oldimage" value="<?php echo $row['Image'];?>"></br></br>
   <input type="submit" name="edit" value="edit">
</form>                    
</body>
</html>
<?php
include("connection.php");
if($_POST['edit']){
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $state = $_POST['state'];
    $city  = $_POST['city'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];

    $newimage = $_FILES['image']['name'];
    $oldimage = $_POST['oldimage'];
    if($newimage != ''){
      $update_file = $_FILES['image']['name'];
    }

    else{
        $update_file = $oldimage;  
    }
   
    //$sql = "INSERT INTO `form2`(`id`, `fname`, `lname`, `email`, `password`, `gender`, `city`, `language`) VALUES (' ','$fname','$lname','$email','$password','$gender','$city','$language')";
    $sql = "UPDATE `form3` SET `ID`='$id',`Name`='$fname',`Email`='$email',`mobileNo`='$mobile',`State`='$state',`City`='$city',`Address`='$address',`Pincode`='$pincode',`Image`='$update_file' WHERE ID = '$id'";
    $data = mysqli_query($conn , $sql);
    if($data){
        echo "record updated";
    }
    else{
        echo "record not updated";
    }

}
?>