<?php
    include 'templates/connect.php';
    include 'templates/packageclass.php';
    $agentform = new Agent($_POST);
    $AgtFirstName = $agentform->getFirstName();
    $AgtMiddleInitial = $agentform->getMiddleInitial();
    $AgtLastName = $agentform->getLastName();
    $AgtBusPhone = $agentform->getPhoneNumber();
    $AgtEmail = $agentform->getEmail();
    $AgtPosition = $agentform->getPosition();
    $sql = "INSERT INTO agents (AgtFirstName, AgtMiddleInitial, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition, AgencyId)
    VALUES ('$AgtFirstName', '$AgtMiddleInitial', '$AgtLastName', '$AgtBusPhone', '$AgtEmail', '$AgtPosition', '$AgencyId')";
if ($connect->query($sql) === TRUE) {
        echo "New entry creation successful";
    } else {
        echo "Error creating new entry";
    }
    
    include 'functions.php';
?>