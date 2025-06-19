<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "");

    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "roamLanka");


    $destination = mysqli_real_escape_string($con, $_POST['destination']);
    $firstName = mysqli_real_escape_string($con, $_POST['name']);
    $lastName = mysqli_real_escape_string($con, $_POST['lname']);
    $address1 = mysqli_real_escape_string($con, $_POST['s1']);
    $address2 = mysqli_real_escape_string($con, $_POST['s2']);
    $city = mysqli_real_escape_string($con, $_POST['ci']);
    $state = mysqli_real_escape_string($con, $_POST['st']);
    $country = mysqli_real_escape_string($con, $_POST['po']);
    $telNumber = mysqli_real_escape_string($con, $_POST['tel']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $arrivalDate = mysqli_real_escape_string($con, $_POST['arrival-date']);
    $arrivalTime = mysqli_real_escape_string($con, $_POST['time']);
    $departureDate = mysqli_real_escape_string($con, $_POST['dep-date']);
    $departureTime = mysqli_real_escape_string($con, $_POST['time2']);
    $noOfAdults = mysqli_real_escape_string($con, $_POST['adu']);
    $noOfKids = mysqli_real_escape_string($con, $_POST['ch']);
	$paymentMethod = $_POST['payment-method'];
	$noOfRooms = mysqli_real_escape_string($con, $_POST['ad']);
    $roomType = '';

  
    if (isset($_POST['ac1'])) {
        $roomType .= 'A/C Single Room, ';
    }
    if (isset($_POST['ac2'])) {
        $roomType .= 'A/C Double Room, ';
    }
    if (isset($_POST['nonac1'])) {
        $roomType .= 'Non A/C Single Room, ';
    }
    if (isset($_POST['nonac2'])) {
        $roomType .= 'Non A/C Double Room';
    }

    $roomType = mysqli_real_escape_string($con, $roomType);

  
    $sqlUser = "INSERT INTO user (FirstName, LastName, Address1, Address2, City, Province, Country, Tel_no, Email)
                VALUES ('$firstName', '$lastName', '$address1', '$address2', '$city', '$state', '$country', '$telNumber', '$email')";
    mysqli_query($con, $sqlUser);

   
    $userId = mysqli_insert_id($con);


    $sqlReservation = "INSERT INTO userReservation (arrivalDate, arrivalTime, departureDate, departureTime, noOfguests, noOfchild, roomType, noOfrooms, userID, paymentMethod)
                      VALUES ('$arrivalDate', '$arrivalTime', '$departureDate', '$departureTime', $noOfAdults, $noOfKids, '$roomType', $noOfRooms, $userId, $paymentMethod )";
    mysqli_query($con, $sqlReservation);

    mysqli_close($con);


    header("Location: success.php");
    exit();
}
?>
