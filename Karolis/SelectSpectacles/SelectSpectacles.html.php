<!-- 
    Karolis Grigaliunas
    C00287940
    Select Spectacles Form
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="./SelectSpectacles.js"></script>
    <link rel="stylesheet" href="SelectSpectacles.css"/>
    <title>Spectacle Selection</title>
</head>
<div>
    <!-- header -->
    <header class="">
        <div class="logo">
            <img src="../../assets/logo.webp" alt="">
            <p class="logo-text">Optician Portal</p>
        </div>
    </header>
</div>
    
<body>
    <!-- sidenav -->
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
        <!-- Main Form -->
    <h2>Select Spectacles</h2>
    <fieldset>
        <?php
            include "./CustomerList.php";
        ?>
        <p id="display"></p><!-- display to hold data from listbox -->
        <form>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" readonly>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" readonly>
            <label for="dob">Date of Birth</label>
            <input type="text" name="dob" id="dob" readonly>
            <label for="lefteye">Left Eye Measurement</label>
            <input type="text" name="lefteye" id="lefteye" readonly>
            <label for="righteye">Right Eye Measurement</label>
            <input type="text" name="righteye" id="righteye" readonly>
            <label for="testdate">Test Date</label>
            <input type="text" name="testdate" id="testdate" readonly>
        </form>
    </fieldset>
    </div>
</div>
</body>
</html>