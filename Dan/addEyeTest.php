<?php
include 'db.con.php';

date_default_timezone_set('UTC');

$sql = "INSERT INTO test (PatientID,RightEye,LeftEye,TestDate) VALUES ('$_POST[PatientID],$_POST[RightEye]','$_POST[LeftEye]','$_POST[TestDate]')";

if (!mysqli_query($con,$sql))
    {
        die("An error in the SQL Query: " .mysqli_error($con));
    }
echo "Entry has been added";

mysqli_close($con);
?>