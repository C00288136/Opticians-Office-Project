<!-- 
    Karolis Grigaliunas
    C00287940
    Amend Stock Listbox
 -->
<!-- Import Select2 libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<?php
// connection
    include "../../db.con.php";

    // Query database for iventory stock and and supplier name
    $result = $con->query("SELECT StockNumber, Description, CostPrice, RetailPrice, ReorderQty, SupplierID
    FROM inventory WHERE deleted_flag = false");

    if(!$result){//error check
        echo "Failed to retrieve data from MySQL: " . $con->error;
    } else {
        echo "<select class='listbox' name='listbox' id='listbox' style='width: 200px;'>";
        echo "<option value='' disabled selected>Select an option</option>";//initial placeholder
        // Display items in select dropdown
        while($row = $result->fetch_assoc()){
            // make variables for all data and convert to $all for options
            $id = $row['StockNumber'];
            $description = $row['Description'];
            $cost = $row['CostPrice'];
            $retail = $row['RetailPrice'];
            $reorder = $row['ReorderQty'];
            $name = $row['SupplierID'];
            
            $all = "$id,$description,$cost,$retail,$reorder,$name";
            echo "<option value='" . $all . "'>" . $description . "</option>"; //Set select values 
        } 
        echo "</select>";
    }
    // Close DB connection
    $con->close();
?>

<!-- USING select2 libraries and Select2.org and forum guides  -->
<!-- Used to add search feature to select -->
<script>
$(document).ready(function() {
    // Initialize Select2 for the select dropdown
    $('#listbox').select2();

    // Call the populate function when an option is selected
    $('#listbox').on('change', function() {
        populate();
    });
});
</script>
