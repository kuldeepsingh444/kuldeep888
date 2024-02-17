<?php
include("connection.php");
$id = $_GET['id'];
$sql = "DELETE FROM form3 WHERE ID='$id'";
$data = mysqli_query($conn,$sql);
if($data){
    echo "deleted successful";
}
else{
    echo "not deleted";
}
?>