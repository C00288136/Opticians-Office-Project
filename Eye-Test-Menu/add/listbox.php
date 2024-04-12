<?php
include '../../db.con.php';

$sql = "SELECT * FROM patient WHERE deleted_flag = 0";

if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

echo "<br><select name='listbox' id='listbox' onchange='populate()'>";
echo "<option value='' disabled selected>Select a patient</option>";

while ($row = mysqli_fetch_assoc($result)) {
    // Sanitize the output to prevent XSS attacks
    $patientID = $row['PatientID'];
    $name = $row['Name'];
    $address = $row['Address'];
    $eircode = $row['Eircode'];
    $dob = $row['DOB'];
    $dob = date_create($row['DOB']);
    $dob = date_format($dob, "d-m-Y");
    $phoneNo = $row['Phone'];
    $balance = $row['Balance'];
    $alltext = "$patientID,$name,$address,$eircode,$dob,$phoneNo,$balance";

    echo "<option value='$alltext'>$name</option>";
}
echo "</select>";

mysqli_close($con); // Close the database connection
?>
