<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Items</title>
    <link rel="stylesheet" type="text/css" href="order.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script></head>
<body>

<div class="container">
<h1>Make Order</h1>


<form>
<?php include 'supplierListBox.php';?>
    <input type="button" value="Select Supplier" id="submitSup">
    <input type="hidden" id="supplier"  name="supplier">
</form>

<script>
    document.getElementById("Suplistbox").addEventListener("change",function(){
        var selectedValue = this.value;
        var supplierparts = selectedValue.split(",")
        var supplierID = supplierparts[0];
        document.getElementById("supplier").value = supplierID;
        console.log(supplierID)
      
    });

    // .ready used by the query to send data everything stored inside the function tag
    $(document).ready(function(){
//      this function will store all the variable and data send over on click 
        $("#submitSup").click(function(){

            // saves the value saved in the hidden supplierid as supplier in the function
            let supplierID = $("#supplier").val();

            // fucntion doesnt run if supplierid is empty
            if(supplierID ==''){
                return false
            }

            $.ajax({
                type: "POST",
                url: "supplierListBox.php",
                data: {
                    supplierID : supplierID
                },
                cache: false,
                success: function(data){
                    alert(data)
                },
                error: function(xhr,status,error){
                    console.log(xhr);
                }
            });   
        })
    });
</script>

    <p id="display"></p>
    
    <form  action= "Order.php" onsubmit="return confirmCheck()" method="post" id="mainform">
        
    <label for="StockNumber">Stock Number</label>
    <input type="text" name="StockNumber" id="StockNumber" disabled>
    
    <label for="Description">Description</label>
    <input type="text" name="Description" id="Description" disabled>
    
    <label for="Quantity">Quantity</label>
    <input type="text" name="Quantity" id="Quantity" disabled>

    <label for="ReorderQty">Reorder Quantity</label>
    <input type="text" name="ReorderQty" id="ReorderQty" disabled>
    
    <label for="SupplierStockCode">Supplier Stock Code</label>
    <input type="text" name="SupplierStockCode" id="SupplierStockCode" disabled>
    
    <label for="SupplierID">Supplier ID</label>
    <input type="text" name="SupplierID" id="SupplierID" disabled>

    <br><br>

    <div id="error-message"></div>

    <input type="button" value="Create Order" id="viewViewbutton" onclick="toggleLock()">
    <input type="submit" id="button" value="Save Changes">
</form>

</div>

</body>
</html>
