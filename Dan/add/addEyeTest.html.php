<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addEyeTest.css">
    <title>Opticians Menu</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="C:/xamp/htdocs/Opticians-Office-Project/assets/user.png">
            <p class="logo">Optician Portal</p>
        </div>
    </header>
    <div class="container">
        <div class="navBar">
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="#countersales">Counter Sales</a></li>
                <li><a href="#spectaclesales">Spectacle Sales</a></li>
                <li><a href="#eyetestmenu">Eye Test Menu</a></li>
                <li><a href="#stockcontrol">Stock Control</a></li>
            </ul>
        </div>
        <div class="form-container">
            <form action="addEyeTest.php" onsubmit="return validateForm()">
                <div class="input-container">

                    <?php
                    include 'listbox.php';
                    ?><br>
                    <label for="customerID">Customer ID: </label>
                    <input type="number" id="customerID" name="customerID" required>
                    
                    <label for="RightEye">Right eye:</label>
                    <input type="text" id="RightEye" name="RightEye" required>
                    
                    <label for="LeftEye">Left eye:</label>
                    <input type="text" id="LeftEye" name="LeftEye" required>
                    
                    <label for="TestDate">Test Date:</label>
                    <input type="date" id="TestDate" name="TestDate" required><br><br>

                    <input type="submit" value="Submit">
                    <input type="reset" value="Clear">
                </div>
            </form>
        </div>

    </div>
</body>
</html>