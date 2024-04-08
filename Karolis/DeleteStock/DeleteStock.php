<?php 
    session_start(); 
    include "../../db.inc.php";

    // Update the record in the database
    $sql = "UPDATE inventory SET deleted_flag = true WHERE StockNumber = '$_POST[stocknumber]'";

    if(!mysqli_query($con, $sql)) {
        echo "Error updating record: " . mysqli_error($con);
    } 
        // Set session variables
        $_SESSION["stocknumber"] = $_POST['stocknumber'];
        $_SESSION["description"] = $_POST['description'];

    // Close connection
    mysqli_close($con);
?>
<script>
    window.location = "DeleteStock.html.php"
</script>
