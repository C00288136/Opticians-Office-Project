<?php

$sql = "UPDATE test SET PatientID = '{$_POST['amenddescription']}',RightEye = '{$_POST["amendretail"]}',LeftEye = '{$_POST["amendretail"]}', TestDate = '{$_POST["amendname"]}'  WHERE TestID = '$_POST[TestID]'";

if(!mysqli_query($con, $sql))
{
    echo "Error". mysqli_error($con);
}
?>