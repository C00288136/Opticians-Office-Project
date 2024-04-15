<?php 
    session_start(); 
    include "../../db.con.php";

    // Update the record in the database
    $sql = "UPDATE test SET deleted_flag = 1 WHERE testID = '$_POST[TestID]'";

    if(!mysqli_query($con, $sql)) {
        echo "Error updating record: " . mysqli_error($con);
    } else {
        // Set session variable for deleted test ID
        $_SESSION["deleted_testID"] = $_POST['TestID'];
    }

    // Close connection
    mysqli_close($con);
?>
<script>
    // Redirect back to deleteEyeTest.html.php
    window.location = "deleteEyeTest.html.php";
</script>
