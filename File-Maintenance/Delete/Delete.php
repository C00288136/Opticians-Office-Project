<?php session_start();

include '../db.con.php';
// query to count the amount of entires present containing the posted patientID
$test_sql = "SELECT COUNT(*) AS count FROM test WHERE PatientID = '$_POST[delid]'";

$result = mysqli_query($con,$test_sql);

if($result){
    // Fetches the next row from the result set returned by the SQL query and returns it as an associative array
    $row = mysqli_fetch_assoc(($result));
    // Assigns the value of the 'count' column from the fetched row to the variable $entries
    $entires = $row['count'];
//    if not entries present the code is exected to update the delete flag
    if ($entires == 0){
        
        $sql = "UPDATE Patient SET  deleted_flag = true where PatientID = '$_POST[delid]'";
        
        if(mysqli_query($con, $sql)) {
            // Check if any rows were affected
            if(mysqli_affected_rows($con) > 0) {
                echo "Record updated successfully<br>";
            } else {
                echo "No records updated. Check if the record exists.<br>";
            }
            $_SESSION['patientid'] = $_POST['delid'];
            $_SESSION['firstname'] = $_POST['deleteName'];  
        } else {
            echo "Error updating record: " . mysqli_error($con) . "<br>";
        }
    }
    else{
        echo "<script>alert('Test record(s) present. Patient cannot be deleted');</script>";
    }
}




mysqli_close($con);
?>
<script>
    window.location.href = "Delete.html.php";

</script>
