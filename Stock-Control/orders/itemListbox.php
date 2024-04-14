<?php
/* Name: Michal Kuras
Student Number : C00288136
Purpose: PHP for receiving supplier id and querying the items sold by the supplier
Date: 12/04/24
*/
include '../../db.con.php';

// supplierid received from the ajax post
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