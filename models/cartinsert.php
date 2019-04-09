<?php
    include 'connect.php';

    // random string generator
    $length = 8;
    $randomString = substr(str_shuffle(md5(time())),0,$length);
   

    $BookingDate = date("Y-m-d H:i:s");
    $BookingNo = $randomString;
    $TravelerCount = 
    $CustomerId = 
    $TripTypeId = 
    $PackageId = 
    $sql = "INSERT INTO bookings (BookingDate, BookingNo, TravelerCount, CustomerId, TripTypeId, PackageId)
    VALUES ('$BookingDate', '$BookingNo', '$TravelerCount', '$CustomerId', '$TripTypeId', '$PackageId')";
    if ($connect->query($sql) === TRUE) {
        echo "New entry creation successful";
    } else {
        echo "Error creating new entry";
    }

?>