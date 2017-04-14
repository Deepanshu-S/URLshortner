<?php
/*$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";*/


$hexadecimal = '999';
echo $hd =  base_convert($hexadecimal, 10, 32);
echo "</br>".base_convert($hd, 32, 10);


?>
