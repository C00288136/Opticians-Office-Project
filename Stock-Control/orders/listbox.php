<?php
include '../db.con.php' ;
date_default_timezone_set('UTC');

$sql = "SELECT StockNumber , Description, Quantity, ReorderQty, SupplierStockCode ,SupplierID FROM Inventory where deleted_flag = 0";

if (!$result = mysqli_query($con,$sql)){
    die('Error in querying the database' . mysqli_error($con));
}

echo "<BR><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

while( $row = mysqli_fetch_array($result)){
    $id = $row['StockNumber'];
    $description = $row['Description'];
    $quantity = $row['Quantity'];
    $ReorderQty = $row['ReorderQty'];
    $SupplierStockCode = $row['SupplierStockCode'];
    $SupplierID = $row['SupplierID'];
    $allText = "$id,$description,$quantity,$ReorderQty,$SupplierStockCode,$SupplierID";
    echo "<option value='$allText'>$description</option>";

}

echo "</select>";
mysqli_close($con);
?>
