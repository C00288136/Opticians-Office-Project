<?php
include '../db.con.php';

$supID = $_POST['supplierID'];


$sql = "SELECT StockNumber, Description 
        FROM Inventory 
        INNER JOIN supplier ON Inventory.SupplierID = supplier.SupplierID 
        WHERE supplier.SupplierID = $supID";

if (!$result = mysqli_query($con, $sql)) {
    die("Error in querying database" . mysqli_error($con));
}

$output = '';
while($row = mysqli_fetch_array($result)){
    $id = $row['StockNumber'];
    $description = $row['Description'];
    $output .= "$id|$description|";
}


mysqli_free_result($result);
mysqli_close($con);

echo $output;
?>