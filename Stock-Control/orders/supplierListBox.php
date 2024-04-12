<?php
include '../../db.con.php' ;
$supsql = "SELECT SupplierID, Name FROM supplier where deleted_flag = 0";

if(!$supresult = mysqli_query($con,$supsql)){
    die('Error in querying the database' . mysqli_error($con));
}



echo "<BR><select Supplier = 'Suplistbox' id = 'Suplistbox'>";
while($row = mysqli_fetch_array($supresult)) {
    $id = $row['SupplierID'];
    $name = $row['Name'];
    $allText = "$id,$name";

    echo "<option value='$allText'>$name</option>";
}
echo "</select>";


mysqli_close($con);
?>

