<?php
$con = mysqli_connect("localhost", "root", ""); 
  
if (!$con) { 
  die('Could not connect: ' . mysqli_error($con)); 
} 

mysqli_select_db($con, "roamLanka"); 

$sql1 = "CREATE TABLE user (
  userID int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(userID), 
  FirstName varchar(15), 
  LastName varchar(15), 
  Address1 varchar(25),
  Address2 varchar(25),
  City varchar(20),
  Province varchar(15),
  Country varchar(20),
  Tel_no varchar(20),
  Email varchar(30)
)"; 

mysqli_query($con, $sql1); 

$sql2 = "CREATE TABLE userReservation (
  reservationID int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(reservationID), 
  userID int,
  arrivalDate varchar(10), 
  arrivalTime TIME, 
  departureDate varchar(10), 
  departureTime TIME,
  noOfguests int,
  noOfchild int,
  noOfrooms int,
  roomType varchar(25),
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)"; 

mysqli_query($con, $sql2);

$sql3 = "CREATE TABLE userLogin (
  userName varchar(25),
  email varchar(30),
  password varchar(5),
  PRIMARY KEY(password, email)
)";

mysqli_query($con, $sql3);
mysqli_close($con);
?>
