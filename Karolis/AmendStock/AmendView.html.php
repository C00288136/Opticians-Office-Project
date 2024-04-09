<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./AmendStock.css">
    <script src="./AmendStock.js"></script>
    <!-- IMPORT jQuery libraries for select2 -->
    <title>Amend Stock</title>
</head>
<body>
<div>
    <header class="">
        <div class="logo">
            <img src="../../assets/logo.webp" alt="">
            <p class="logo-text">Optician Portal</p>
        </div>
    </header>
    </div>
    <div class="sidenav">
        <a href="#home">Home</a><br>
        <a href="../AddStock/AddStockForm.html.php">Add Stock</a><br>
        <a href="../DeleteStock/DeleteStock.html.php">Delete Stock</a><br>
        <a href="../AmendStock/AmendView.html.php">Amend/View Stock</a><br>
    </div>
    <div>
    <h2>Amend/View Stock</h2>
    </div>
    <fieldset>
    <?php
        include "listbox.php";
    ?>  
    <p id="display"></p>
    <form name="myForm" action="AmendView.php" onsubmit="return confirmCheck()" method="post">
    <div class="fields">
        <label for="amendid">Stock ID</label>
        <input type="text" name="amendid" id="amendid" disabled>
        <label for="amenddescription">Description</label>
        <input type="text" name="amenddescription" id="amenddescription" disabled>
        <label for="amendcost">Cost Price</label>
        <input type="text" name="amendcost" id="amendcost" disabled>
        <label for="amendretail">Retail Price</label>
        <input type="text" name="amendretail" id="amendretail" disabled>
        <label for="amendreorder">Reorder Quantity</label>
        <input type="text" name="amendreorder" id="amendreorder" disabled>
        <label for="amendname">Supplier Name</label>
        <select name="amendname" id="amendname" disabled >
                    <?php 
                        //Database connection
                        include "../../db.inc.php";
                
                        $con = mysqli_connect($host, $username, $password, $dbname);
                
                        if(!$con){
                            echo "Failed to connect to MySQL" . mysqli_connect_error();
                        }

                        // Query to get suppliers
                        $result = $con->query("SELECT SupplierID, Name FROM Supplier");

                        // Output suppliers in dropdown menu
                        while($row = $result->fetch_assoc()){
                            echo "<option value='" . $row['SupplierID'] . "'>" . $row['Name'] . "</option>";
                        }

                        // Close DB connection
                        $con->close();
                    ?>
                </select>
    </div>
        <br><br>
        <input type="button" value="Amend Details" id="amendViewButton" onclick="toggleLock()">
        <input type="submit" value="Save Changes">
    </form>
</fieldset>

</body>
</html>
