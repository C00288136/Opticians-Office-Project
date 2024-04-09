<?php
include 'db.con.php';
date_default_timezone_set('UTC');

$sql = "SELECT Name FROM patient where Deleted_Flag = 0";

if (!$result = mysqli_query($con, $sql))
{
    die('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name='listbox' id='listbox' onclick='populate()'>";

while ($row = mysqli_fetch_array($result))
{
    $patientID = $row['PatientID'];
    $name = $row['Name'];
    $address = $row['Address'];
    $eircode = $row['Eircode'];
    $dob = $row['DOB'];
    $phone = $row['phone'];
    $allText = "$patientID,$name,$address,$eircode,$dob,$phone";
    echo "<option value='$allText'>$name</option>";
}
echo "</select>";
mysqli_close($con);
?>
