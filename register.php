<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "amigosreg"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = "John Doe";
$email = "john.doe@example.com";


$sql = "INSERT INTO reg (phoneno, fname, password,country,gender,dob) VALUES ('$phonenumber', '$fname', '$password', '$country', '$gender', '$dob')";


