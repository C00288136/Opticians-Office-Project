<!-- 
    Karolis Grigaliunas
    C00287940
    Amend Stock Form
 -->
 <?php 
//  Session start for output query message
    session_start();
    ?>
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
    <!-- Header -->
    <header class="">
        <div class="logo">
            <img src="../../assets/logo.webp" alt="">
            <p class="logo-text">Optician Portal</p>
        </div>
    </header>
    </div>
    <div class="container">
        <!-- sidenav -->
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
        <!-- Main content form -->
    <h2>Amend/View Stock</h2>
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
                include "../../db.con.php";
        
                $con = mysqli_connect($host, $username, $password, $dbname);
                // Error output
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
    <div class="button">
        <input type="button" value="Amend Details" id="amendViewButton" onclick="toggleLock()">
        <input type="submit" value="Save Changes">
    </div>
    </form>
</fieldset>
<?php
    // Check if the session variable is set
    if(isset($_SESSION["stocknumber"])) {
        // Display message if session variables are set
        echo "<h3 class='myMessage'>Stock Item Updated  - ".$_SESSION["stocknumber"].": ".$_SESSION["description"]."</h3>";
        
        // Destroy the session if refreshed
        session_destroy();
    }
?>
</div>
</div>
</body>
</html>
