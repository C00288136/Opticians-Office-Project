/* Name: Daniel Mccormack
Student Number : C00287277
Purpose: php script used to insert values from our html into the database
Date: 01/03/24
*/

<?php
include '../../db.con.php';

$sql = "SELECT * FROM patient WHERE deleted_flag = 0"; // results that arent marked for deletion will be shown

if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

echo "<br><select name='listbox' id='listbox' onchange='populate()'>"; // note: our php is running inside of an html envirornment so we can use these expressions here. "onchange" calls populate every time we select something
echo "<option value='' disabled selected>Select a patient</option>";

while ($row = mysqli_fetch_assoc($result)) { // set our variables equal to their respective rows
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
