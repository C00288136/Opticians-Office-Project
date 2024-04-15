<?php
include '../../db.con.php';

$patientID = isset($_POST['patientID']) ? $_POST['patientID'] : '';

$sql = "SELECT * FROM test WHERE patientID = '$patientID' AND deleted_flag = 0";

if (!$result = mysqli_query($con, $sql)) {
    die("Error in querying database: " . mysqli_error($con));
}

echo "<br><select name='testIDlistbox' id='testIDlistbox' onchange='populate()'>";
echo "<option value='' disabled selected>Select a test</option>";

while($row = mysqli_fetch_array($result)){
    $testID = $row['TestID']; // Changed 'testID' to 'TestID'
    $rEye = $row['RightEye']; // Changed 'Right' to 'RightEye'
    $lEye = $row['LeftEye'];
    $testDate = date_create($row['TestDate']);
    $testDate = date_format($testDate, "Y-m-d");

    $alltext = "$testID,$rEye,$lEye,$testDate";
    echo "<option value='$alltext'>$testID</option>";
}
echo "</select>";

mysqli_free_result($result);
mysqli_close($con);
?>