<!-- 
    Karolis Grigaliunas
    C00287940
    Add Stock Form
 -->
 <?php 
//  Session start for output query message
    session_start();
    ?>
<!DOCTYPE html>
<html>
<head>
    <!-- JS and CSS link -->
    <link rel="stylesheet" href="./AddStock.css">
    <title>Add Stock Item</title> <!-- Page title -->
    <script src="Validate.js"></script>
</head>

<body>
    <!-- Header -->
    <header class="">
        <div class="logo">
            <img src="../../assets/logo.webp" alt=""> <!-- Logo image link -->
            <p class="logo-text">Optician Portal</p>
        </div>
    </header>
    <div class="container">
    <!-- side nav -->
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
    <!-- Main Content Form -->
    <h2>Add Stock Item Information</h2><br>
    <fieldset>
    <form action="AddStock.php" method="post" onsubmit="return  checkSubmit()"> <!-- Form Calls Validationm Function -->
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" id="description" placeholder="Description" autocomplete="off" required>
            </div>
            <div>
                <label for="cost">Cost Price</label>
                <input type="number" name="cost" id="cost" placeholder="Cost" step="any" min="0" autocomplete="off" oninput="validate()" required>
            </div>
            <div>
                <label for="retail">Retail Price</label>
                <input type="number" name="retail" id="retail" placeholder="Retail" step="any" min="0" autocomplete="off" oninput="validate()" required>
            </div>
            <div>
                <label for="reorder">Reorder Quantity</label>
                <input type="number" name="reorder" id="reorder" placeholder="Reorder Quantity" autocomplete="off" oninput="validate()" required>
            </div>
            <div>
                <label for="stockcode">Supplier Stock Code</label>
                <input type="number" name="stockcode" id="stockcode" placeholder="Stock Code" autocomplete="off" oninput="validate()" required>
            </div>
            <div>
                <label for="supplierid">Supplier</label>
                <select name="supplierid" id="supplierid">
                    <?php 
                        //Database connection
                        include "../../db.con.php";
                        $con = mysqli_connect($host, $username, $password, $dbname);
                        // Error Output
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
                <p style="color:red;text-align:center;" id="errorMsg" class="errorMsg"></p><!-- Error Message  -->
            <div class="button">
                <input type="submit" value="Add Item">
                <br>
                <input type="reset" value="Clear" onclick="Clear()">
            </div> 
        </fieldset>
    </form>
        <?php
            // Check if the session variable is set
            if(isset($_SESSION["stocknumber"])) {
                // Display message if session variables are set
                echo "<h3 class='myMessage'>Stock Item Added  - ".$_SESSION["stocknumber"].": ".$_SESSION["description"]."</h3>";
                
                // Destroy the session to remove the message after displaying it
                session_destroy();
            }
        ?>
    </div>
    </div>
</body>
</html>
