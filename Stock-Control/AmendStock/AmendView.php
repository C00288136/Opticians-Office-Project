<!-- 
    Karolis Grigaliunas
    C00287940
    Amend Stock Query
 -->
<?php   
    session_start();
    // Connection
    include "../../db.con.php";

    // SQL query
    $sql = "UPDATE inventory SET Description = '{$_POST['amenddescription']}',CostPrice = '{$_POST["amendcost"]}',RetailPrice = '{$_POST["amendretail"]}',ReorderQty = '{$_POST["amendretail"]}', SupplierID = '{$_POST["amendname"]}'  WHERE StockNumber = '$_POST[amendid]'";
    // Error Output
    if (!mysqli_query($con, $sql))
        die ("An Error in the SQL Query: ". mysqli_error($con) ); //error report

    if(mysqli_affected_rows($con) != 0)//if row was edited
        {
            // Set session variables
            $_SESSION["stocknumber"] = $_POST['amendid'];
            $_SESSION["description"] = $_POST['amenddescription'];
        }
    mysqli_close($con);
    ?>
<!-- Return to form screen when query ran -->
<script>
    window.location = "AmendView.html.php"; 
</script>