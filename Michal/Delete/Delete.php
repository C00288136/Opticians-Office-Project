<?php session_start();
include '../db.con.php';

if(isset($_POST['deleteid'])) {
    $delid = $_POST['deleteid'];
    echo "deleteid: $deleteid"; // Debugging output
    // Continue with your code...
} else {
    echo "delid not received from the form"; // Debugging output
}

$sql = "UPDATE Patient SET  deleted_flag = 1 where PatientID = '$_POST[deleteid]'";

if(mysqli_query($con, $sql)) {
    // Check if any rows were affected
    if(mysqli_affected_rows($con) > 0) {
        echo "Record updated successfully<br>";
    } else {
        echo "No records updated. Check if the record exists.<br>";
    }
} else {
    echo "Error updating record: " . mysqli_error($con) . "<br>";
}

$_SESSION['personid'] = $_POST['delid'];
$_SESSION['firstname'] = $_POST['deleteName'];


mysqli_close($con);
?>
<!-- <script>
    window.location.href = "Delete.html.php";
</script> -->
