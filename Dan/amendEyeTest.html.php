<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a>Please select the test you would like to ammend</a>
    <?php include 'listbox.php';?>

    <label for="TestID">TestID:</label>
    <input type="number" id="TestID" name="TestID" required>
    <label for="RightEye">Right eye:</label>
    <input type="number" id="RightEye" name="RightEye" step="any" required>
    
    <label for="LeftEye">Left eye:</label>
    <input type="number" id="LeftEye" name="LeftEye" step="any" required>
    
    <label for="TestDate">Test Date:</label>
    <input type="date" id="TestDate" name="TestDate" required>
</body>
</html>