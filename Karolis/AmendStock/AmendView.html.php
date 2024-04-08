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
    <h2>Amend/View a Person</h2>
    </div>
    <fieldset>
    <?php
        include "listbox.php";
    ?>  
    <p id="display"></p>
    <form name="myForm" action="AmendView.php" onsubmit="return confirmCheck()" method="post">
    <div class="fields">
        <label for="amendid">Person ID</label>
        <input type="text" name="amendid" id="amendid" disabled>
        <label for="amendfirstname">First Name</label>
        <input type="text" name="amendfirstname" id="amendfirstname" disabled>
        <label for="amendlastname">Surname</label>
        <input type="text" name="amendlastname" id="amendlastname" disabled>
        <label for="amendDOB">Date of Birth</label>
        <input type="text" name="amendDOB" id="amendDOB" disabled>
        <label for="amendemail">Email</label>
        <input type="text" name="amendemail" id="amendemail" disabled>
    </div>
        <br><br>
        <input type="button" value="Amend Details" id="amendViewButton" onclick="toggleLock()">
        <input type="submit" value="Save Changes">
    </form>
</fieldset>

</body>
</html>
