<!-- Author: Ariel Contreras -->
<!-- Insert checkout details into DB -->
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include 'connect.php';

    // random string generator
    $length = 8;
    $randomString = substr(str_shuffle(md5(time())),0,$length);
   

    $BookingDate = date("Y-m-d");
    $BookingNo = $randomString;
    $TravelerCount = 1;
    $CustomerId = $_SESSION['customerID'];
    $TripTypeId = "L";
    $PackageId = $_SESSION['cart'];
    var_dump($BookingDate, $BookingNo, $TravelerCount, $CustomerId, $TripTypeId, $PackageId);
    $sql = "INSERT INTO bookings (BookingDate, BookingNo, TravelerCount, CustomerId, TripTypeId, PackageId)
    VALUES ('$BookingDate', '$BookingNo', '$TravelerCount', '$CustomerId', '$TripTypeId', '$PackageId')";
    if ($connect->query($sql) === TRUE) {
        echo "New entry creation successful";
    } else {
        echo "Error creating new entry";
    }
    header('location: ../bookingPage.php');
?>