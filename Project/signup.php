<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "");

    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, "roamLanka");

    $username =  $_POST['name'];
    $email =  $_POST['email'];
    $password =  $_POST['conpassword'];


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql= "INSERT INTO userLogin (userName, email, password)
                VALUES ('$username', '$email', '$hashedPassword')";
    mysqli_query($con, $sql);

    mysqli_close($con);

    header("Location: success.php");
    exit();
}
?>
