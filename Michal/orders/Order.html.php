<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" type="text/css" href="order.css">
    <script src="order.js"></script>
</head>
<body>

<div class="container">
<h1>View items / Make Order</h1>
<h4>View item info click Order to create a order</h4>

<?php include 'listbox.php';?>

    <p id="display"></p>
    
    <form  action= "Order.php" onsubmit="return confirmCheck()" method="post">
        
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
