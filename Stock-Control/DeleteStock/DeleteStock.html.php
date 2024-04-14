<!-- 
    Karolis Grigaliunas
    C00287940
    Delete Stock Form
 -->
<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Stock</title>
    <?php 
        include "../../db.con.php";
    ?>
    <!-- IMPORT jQuery libraries for select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="DeleteStock.css"/>
</head>
<body>
<header class="">
    <div class="logo">
        <img src="../../assets/logo.webp" alt="">
        <p class="logo-text">Optician Portal</p>
    </div>
</header>
<div class="container">
<nav>
    <ul>
        <a href="../../index.html">
            <li>Home</li>
        </a>
        <a href="../StockMaintenance.html">
            <li>Stock Control</li>
        </a>
        <a href="../DeleteStock/DeleteStock.html.php">
            <li>Delete Stock</li>
        </a>
        <a href="../AddStock/AddStockForm.html.php.">
            <li>Add Stock</li>
        </a>
        <a href="../AmendStock/AmendView.html.php">
            <li>Amend/View Stock</li>
        </a>
    </ul>
</nav>
<div class="content">
<h2>Choose item to delete</h2>
<fieldset>
<?php
    // Query database for iventory stock and and supplier name
    $result = $con->query("SELECT StockNumber, Description, CostPrice, Quantity, supplier.Name
    FROM inventory
    JOIN supplier ON inventory.SupplierID = supplier.SupplierID WHERE inventory.deleted_flag = false");

    if(!$result){//error check
        echo "Failed to retrieve data from MySQL: " . $con->error;
    } else {
        echo "<select class='stockdesc' name='stockdesc' id='stockdesc' style=''>";
        echo "<option value='' disabled selected>Select</option>";//initial placeholder
        // Display items in select dropdown
        while($row = $result->fetch_assoc()){
            // make variables for all data and convert to $all for options
            $id = $row['StockNumber'];
            $description = $row['Description'];
            $cost = $row['CostPrice'];
            $name = $row['Name'];
            $quantity = $row['Quantity'];
            $all = "$id,$description,$cost,$name,$quantity";
            echo "<option value='" . $all . "'>" . $description . "</option>";
        } 
        echo "</select>";
    }
    // Close DB connection
    $con->close();
?>
<!-- FORM -->
<form action="DeleteStock.php" method="post" onsubmit="return submitCheck()">
    <label for="stocknumber">Stock Number </label>
    <input type="text" name="stocknumber" id="stocknumber" readonly>
    <label for="description">Description </label>
    <input type="text" name="description" id="description" readonly>
    <label for="cost">Cost Price </label>
    <input type="text" id="cost" readonly>  
    <label for="supplier">Supplier Name </label>
    <input type="text" id="supplier" readonly>
    <input type="text" id="quantity" readonly><br>
    <div class="button">
        <input type="submit" value="Delete">
    </div>
</form>
</div>
<?php
    // Check if the session variable is set
    if(isset($_SESSION["stocknumber"])) {
        // Display message if session variables are set
        echo "<h1 class='myMessage'>Record deleted for StockNumber - ".$_SESSION["stocknumber"].": ".$_SESSION["description"]."</h1>";
        
        // Destroy the session to remove the message after displaying it
        session_destroy();
    }
?>

</div> 
</fieldset>
<!-- USING select2 libraries and Select2.org and forum guides  -->
<!-- Used to add search feature to select -->
<script>
    $(document).ready(function() {      //Calls function when html site is fully loaded
        $('.stockdesc').select2({       //Chooses select field with class 'stockdesc' and makes changes for select2
        placeholder: 'Select' //When loads if no option is selected off the places message
        });
    });
    
    $('.stockdesc').on('change', function() {               //Calls function when the option in select is changed
        var selectedData = $('.stockdesc').select2('data'); //takes the data from selected option
        if (selectedData.length > 0) {                      
            var dataParts = selectedData[0].id.split(',');  //Splits the data from $all individually

            //sets the input values with the split data
            $('#stocknumber').val(dataParts[0]);
            $('#description').val(dataParts[1]);
            $('#cost').val(dataParts[2]);
            $('#supplier').val(dataParts[3]);
            $('#quantity').val(dataParts[4]);
        }
    });
    // Validation check
    function submitCheck() {
    var stocknumber = document.getElementById("stocknumber").value;
    var description = document.getElementById("description").value;
    var quantity = document.getElementById("quantity").value; // Retrieve quantity from PHP variable
    if (stocknumber === "") { 
        alert("No option chosen");
        return false;
    } else if (quantity != 0) { // Check if quantity is not zero
        alert("Selected item has stock left in inventory");
        return false;
    } else {
        var result = confirm("Item: " + stocknumber + " - " + description + " will be deleted. Are you sure?");
        return result;
    }
}
</script> 
</body>
</html>