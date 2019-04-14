<!-- Author: Ariel Contreras -->
<!-- Insert travel packages into DB -->
<?php
    include 'connect.php';
    include 'packagesclass.php';

    $packageform = new package($_POST);


    $PkgImgUrl = $packageform->getImgUrl();
    $PkgName = $packageform->getName();
    $PkgDesc = $packageform->getDesc();
    $PkgStartDate = $packageform->getStartDate();
    $PkgEndDate = $packageform->getEndDate();
    $PkgBasePrice = $packageform->getPrice();
    $sql = "INSERT INTO packages (PkgImgUrl, PkgName, PkgDesc, PkgStartDate, PkgEndDate, PkgBasePrice)
    VALUES ('$PkgImgUrl', '$PkgName', '$PkgDesc', '$PkgStartDate', '$PkgEndDate', '$PkgBasePrice')";
    if ($connect->query($sql) === TRUE) {
        echo "New entry creation successful";
    } else {
        echo "Error creating new entry";
    }
    
    include 'output.php';
?>