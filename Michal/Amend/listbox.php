<?php
include '../db.con.php' ;
date_default_timezone_set('UTC');

$sql = "SELECT PatientID , Name, Address, Eircode, DOB ,Phone, Balance FROM Patient where deleted_flag = 0";

if (!$result = mysqli_query($con,$sql)){
    die('Error in querying the database' . mysqli_error($con));
}

echo "<BR><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

while( $row = mysqli_fetch_array($result)){
    $id = $row['PatientID'];
    $name = $row['Name'];
    $address = $row['Address'];
    $eircode = $row['Eircode'];
    $dateOfBirth= $row['DOB'];
    $dob = date_create($row['DOB']);
    $dob = date_format($dob,"d-m-Y");
    $Phone = $row['Phone'];
    $balance = $row['Balance'];
    $allText = "$id|$name|$address|$eircode|$dob|$Phone|$balance";
    echo "<option value='$allText'>$name</option>";

}

echo "</select>";
mysqli_close($con);
?>