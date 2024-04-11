<?php
    session_start();
    include "../../db.con.php";
    

    $maxStockCodeQuery = "SELECT MAX(StockNumber) AS maxStockCode FROM Inventory";
    $maxStockCodeResult = mysqli_query($con, $maxStockCodeQuery);

    if (!$maxStockCodeResult) {
        die("Error retrieving maximum StockCode: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($maxStockCodeResult);
    $maxStockCode = $row['maxStockCode'];

    $nextStockCode = $maxStockCode + 1;

    $sql = "Insert into Inventory (StockNumber, Description, CostPrice, RetailPrice, ReorderQty, SupplierID, SupplierStockCode) VALUES ('$nextStockCode','$_POST[description]', '$_POST[cost]', '$_POST[retail]', '$_POST[reorder]', '$_POST[supplierid]', '$_POST[stockcode]')"; //query

    if (!mysqli_query($con, $sql))
        die ("An Error in the SQL Query: ". mysqli_error($con) ); //error report

    // Set session variables
    $_SESSION["stocknumber"] = $nextStockCode;
    $_SESSION["description"] = $_POST['description'];



    mysqli_close($con); // success output
?>
<script>
    window.location = "AddStockForm.html.php"
</script>