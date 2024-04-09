<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<?php
    include "../../db.inc.php";

    date_default_timezone_set('UTC');

    $sql = "SELECT * FROM patient where deleted_flag = 0";

    if (!$result = mysqli_query($con, $sql)) {
        die('Error in querying the database: ' . mysqli_error($con));
    }

    echo "<br><select name='listbox' id='listbox'>";
    echo "<option value='' disabled selected>Select an option</option>";

    while ($row = mysqli_fetch_array($result)) {
        $id = $row['StockNumber'];
        $description = $row['Description'];
        $cost = $row['CostPrice'];
        $retail = $row['RetailPrice'];
        $reorder = $row['ReorderQty'];
        $allText = "$id,$description,$cost,$retail,$reorder";

        echo "<option value='$allText'>$description</option>";
    }
    echo "</select>";

    mysqli_close($con);
?>

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