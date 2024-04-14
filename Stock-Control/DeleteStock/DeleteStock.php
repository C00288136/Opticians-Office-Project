<!-- 
    Karolis Grigaliunas
    C00287940
    Delete Stock Query
 -->
<?php 
    session_start(); 
    // connection
    include "../../db.con.php";

    // Update the record in the database
    $sql = "UPDATE inventory SET deleted_flag = true WHERE StockNumber = '$_POST[stocknumber]'";
    // Error Output
    if(!mysqli_query($con, $sql)) {
        echo "Error updating record: " . mysqli_error($con);
    } 
        // Set session variables
        $_SESSION["stocknumber"] = $_POST['stocknumber'];
        $_SESSION["description"] = $_POST['description'];

    // Close connection
    mysqli_close($con);
?>
<!-- Return to form screen when query ran -->
<script>
    window.location = "DeleteStock.html.php"
</script>
