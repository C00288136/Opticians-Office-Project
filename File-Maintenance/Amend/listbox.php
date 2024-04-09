<?php
/* Name: Michal Kuras
Student Number : C00288136
Purpose: PHP listbox to retrieve data from the patients table where the entry is not marked as deleted
Date: 10/03/24
*/
include '../../db.con.php' ;
date_default_timezone_set('UTC');

$sql = "SELECT PatientID , Name, Address, Eircode, DOB ,Phone, Balance FROM Patient where deleted_flag = 0";//sql for retrieving the data

// if statment which runs the query and displays a error message if something is wrong
if (!$result = mysqli_query($con,$sql)){
    die('Error in querying the database' . mysqli_error($con));
}

echo "<BR><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";
// while look which fetches the data in a  array called $row then assigns variables from the $row array
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