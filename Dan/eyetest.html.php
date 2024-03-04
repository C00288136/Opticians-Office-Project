<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .form-container {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            text-align: left;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            flex-grow: 1;
            margin: 0 5px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Centered Form</title>
</head>
<body>

    <div class="form-container">
        <form>
            <label for="testID">Test ID:</label>
            <input type="text" id="testID" name="textID" required>

            <label for="rightEye">Right eye:</label>
            <input type="text" id="rightEye" name="rightEye" required>
            
            <label for="leftEye">Left eye:</label>
            <input type="text" id="leftEye" name="leftEye" required>
            
            <label for="testDate">Test Date:</label>
            <input type="date" id="testDate" name="testDate" required>

            <div class="button-container">
                <button type="button">Ammend</button>
                <button type="button">Add</button>
                <button type="button">Delete</button>
            </div>
        </form>
    </div>

</body>
</html>
