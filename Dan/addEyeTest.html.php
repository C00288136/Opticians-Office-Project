<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <script src="script.js"></script>
    <title>Centered Form</title>
</head>
<body>

    <div class="form-container">
        <form action="addEyeTest.php" onsubmit="return submitForm()" method="post">

            <a>Please select an existing customer to add an eye test to</a>
            <?php include 'listbox.php'?>

            <label for="TestID">TestID:</label>
            <input type="number" id="TestID" name="TestID" required>

            <label for="PatientID">PatientID:</label>
            <input type="number" id="PatientID" name="PatientID" required>

            <label for="RightEye">Right eye:</label>
            <input type="number" id="RightEye" name="RightEye" step="any" required>
            
            <label for="LeftEye">Left eye:</label>
            <input type="number" id="LeftEye" name="LeftEye" step="any" required>
            
            <label for="TestDate">Test Date:</label>
            <input type="date" id="TestDate" name="TestDate" required>

            <div class="button-container">
                <button type="Submit" onclick="validateForm()">Add</button>
            </div>
        </form>
    </div>

</body>
</html>
