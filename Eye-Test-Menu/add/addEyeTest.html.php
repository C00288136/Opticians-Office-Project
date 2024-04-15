<!-- 
    Name: Daniel Mccormack
    Student Number: C00287277
    Purpose: HTML form for users to add a test into test field
    Date: 01/03/24
 -->

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addEyeTest.css"> <!-- Link to external CSS file -->
    <title>Opticians Menu</title>
    <script src="addEyeTest.js"></script> <!-- Link to external JavaScript file -->
</head>
<body>
    <header>
        <div class="logo">
            <img src="../../assets/logo.webp"> <!-- Logo image -->
            <p class="logo">Optician Portal</p> <!-- Portal name -->
        </div>
    </header>
    <div class="container">
        <div class="navBar">
            <ul>
                <li><a href="../index.html">Home</a></li> <!-- nav links -->
                <li><a href="#countersales">Counter Sales</a></li>
                <li><a href="#spectaclesales">Spectacle Sales</a></li>
                <li><a href="#eyetestmenu">Eye Test Menu</a></li>
                <li><a href="#stockcontrol">Stock Control</a></li>
            </ul>
        </div>
        <div class="form-container">
            <form action="addEyeTest.php" method="post">
                <div class="input-container">
                    <?php
                    include 'listbox.php'; // php script included so we can select existing customer
                    ?><br>
                    <label for="PatientID">Customer ID:</label> <!-- label for customerID -->
                    <input type="number" id="PatientID" name="PatientID" required>

                    <label for="TestID">Test ID:</label> <!-- Llabel for test ID -->
                    <input type="number" id="TestID" name="TestID" required>
                    
                    <label for="RightEye">Right eye:</label> <!-- label for right eye -->
                    <input type="text" id="RightEye" name="RightEye" required>
                    
                    <label for="LeftEye">Left eye:</label> <!-- Label for left eye -->
                    <input type="text" id="LeftEye" name="LeftEye" required>
                    
                    <label for="TestDate">Test Date:</label> <!-- label for test date -->
                    <input type="date" id="TestDate" name="TestDate" required><br><br>

                    <input type="submit" value="Submit"> <!-- Submit button -->
                    <input type="reset" value="Clear"> <!-- Reset button -->
                </div>
            </form>
        </div>
    </div>
</body>
</html>
