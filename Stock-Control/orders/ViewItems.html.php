<!-- 
Name: Michal Kuras
Student Number : C00288136
Purpose: HTML for viewing items in the inventory before making a order
Date: 12/04/24
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Items</title>
    <link rel="stylesheet" type="text/css" href="order.css">
    <script src="order.js"></script>
</head>
<body>

<header>
        <div class="logo">
            <img src="../../assets/logo.webp" alt="">
            <p class="logo">Optician Portal</p>
        </div>
    </header>

<div class="container">
    <!-- nav for quick naviation back the main menu -->
    <nav>
            <ul>
            <a href="../../index.html">
                    <li>Home</li>
                </a>
                    <a href="">
                        <li>Counter Sales</li>
                    </a>
                    <a href="">
                        <li>Spectacle Sales</li>
                    </a>
                    <a href="../../Eye-Test-Menu/eyeTestMenu.html">

                    <li>Eye Test Menu</li>
                </a>
                <a href="../../Stock-Control/StockMaintenance.html">
                    <li>Stock Control</li>
                </a>
                <a href="../FileMaintenance.html">
                        <li>File Maintenance</li>
                    </a>
            </ul>
        </nav>
        <div class="content">

        
    <h1>View items / Make Order</h1>
    <h4>View item information <br>Order to create a order</h4>
    
    <?php include 'listbox.php';?>
    
        
    <p id="display" hidden></p>
    
    <form id="mainform">
        
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

    <input type="button" value="Create Order" id="Order" onclick="window.location.href='Order.html.php';">
</form>

</div>
</div>

</body>
</html>
