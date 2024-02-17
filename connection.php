<?php
$servername="localhost";
$username = "root";
$password = "";
$port = "4306";
$database = "test";
$conn = mysqli_connect($servername , $username , $password,$database,$port);
if($conn){
    echo "";
}
else{
    echo "not connected";
}

?>