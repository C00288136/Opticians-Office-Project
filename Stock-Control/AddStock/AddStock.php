<!-- 
    Karolis Grigaliunas
    C00287940
    Add Stock Query Insert
 -->
<?php
    session_start();
    // connection
    include "../../db.con.php";
    
    
    //SQL query to fetch current highest StockNumber
    $maxStockCodeQuery = "SELECT MAX(StockNumber) AS maxStockCode FROM Inventory";
    $maxStockCodeResult = mysqli_query($con, $maxStockCodeQuery);
    // Error Output
    if (!$maxStockCodeResult) {
        die("Error retrieving maximum StockCode: " . mysqli_error($con));
    }
    // Get next available StockNumber 
    $row = mysqli_fetch_assoc($maxStockCodeResult);
    $maxStockCode = $row['maxStockCode'];

    $nextStockCode = $maxStockCode + 1;
    // SQL query to add new stock item
    $sql = "Insert into Inventory (StockNumber, Description, CostPrice, RetailPrice, ReorderQty, SupplierID, SupplierStockCode) VALUES ('$nextStockCode','$_POST[description]', '$_POST[cost]', '$_POST[retail]', '$_POST[reorder]', '$_POST[supplierid]', '$_POST[stockcode]')"; //query
    // Error output
    
    // Set session variables
    $_SESSION["stocknumber"] = $nextStockCode;
    $_SESSION["description"] = $_POST['description'];



    mysqli_close($con); // close connection
?>
<!-- Return to form screen when query ran -->
<script>
    window.location = "AddStockForm.html.php"; 
</script>