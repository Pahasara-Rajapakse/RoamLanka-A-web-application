<?php
$servername = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($servername, $username, $password);


if (!$con) { 
  die('Could not connect: ' . mysqli_error($con)); 
}

$sql = "CREATE DATABASE IF NOT EXISTS roamLanka";
if (mysqli_query($con, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($con);
}

mysqli_close($con);
?>
