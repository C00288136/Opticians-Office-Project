<?php
include '../../db.con.php';

$sql = "INSERT INTO test (PatientID, TestID, RightEye, LeftEye, TestDate, deleted_flag) VALUES ('$_POST[PatientID]', '$_POST[TestID]', '$_POST[RightEye]', '$_POST[LeftEye]', '$_POST[TestDate]', 0)";

if (mysqli_query($con, $sql)) {
    // Successful insertion
    echo "<script>alert('Entry has been added'); window.location.href = 'addEyeTest.html.php';</script>";
} else {
    // Error in SQL query
    die("An error in the SQL Query: " . mysqli_error($con));
}
?>
