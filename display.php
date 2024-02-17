<?php
include("connection.php");
// session_start();
// $user = $_SESSION['username'];
// if($user){
//      echo "";
// }
// else{
//     echo header("location:login.php");
// }
$sql = "SELECT * FROM form3";
$data = mysqli_query($conn , $sql);
$num = mysqli_num_rows($data);
if($num != 0){
    ?>
    <h2> Display all Data</h2>
    <table border="2" cellspacing="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>MobileNo</th>
            <th>States </th>
            <th>City</th>
            <th>Address</th>
            <th>Pincode</th>
            <th>Images</th>
            <th width="20%">operations</th>
        </tr>
    <?php
    while($row = mysqli_fetch_assoc($data)){
        echo"
        <tr>
        <td>".$row['ID']."</td>
        <td>".$row['Name']."</td>
        <td>".$row['Email']."</td>
        <td>".$row['mobileNo']."</td>
        <td>".$row['State']."</td>
        <td>".$row['City']."</td>
        <td>".$row['Address']."</td>
        <td>".$row['Pincode']."</td>
        <td><img src = '".$row['Image']."' height='100px' width='100px'></td>
        <td><a href='edit.php?id=$row[ID]'>edit</a>
        <a href='delete.php?id=$row[ID]'>delete</a>
        </td>
        </tr>
        ";
    }
}
else{
    echo " table was not found";
}
?>
</table>