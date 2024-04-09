<!DOCTYPE html>
<html lang="en">
<head>
    <script src="./SelectSpectacles.js"></script>
    <link rel="stylesheet" href="SelectSpectacles.css"/>
    <title>Spectacle Selection</title>
</head>
<div>
    <header class="">
        <div class="logo">
            <img src="../../assets/logo.webp" alt="">
            <p class="logo-text">Optician Portal</p>
        </div>
    </header>
    </div>
    
<body>
<div class="sidenav">
        <a href="#home">Home</a><br>
        <a href="../AddStock/AddStockForm.html.php">Add Stock</a><br>
        <a href="../DeleteStock/DeleteStock.html.php">Delete Stock</a><br>
        <a href="../AmendStock/AmendView.html.php">Amend/View Stock</a><br>
    </div>
    <?php
        include "./CustomerList.php";
    ?>
    <p id="display"></p>
    <br>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" readonly><br>
    <label for="address">Address</label>
    <input type="text" name="address" id="address" readonly><br>
    <label for="dob">Date of Birth</label>
    <input type="text" name="dob" id="dob" readonly><br>
    <label for="lefteye">Left Eye Measurement</label>
    <input type="text" name="lefteye" id="lefteye" readonly>
    <label for="righteye">Right Eye Measurement</label>
    <input type="text" name="righteye" id="righteye" readonly><br>
    <label for="testdate">Test Date</label>
    <input type="text" name="testdate" id="testdate" readonly>
    
</body>
</html>