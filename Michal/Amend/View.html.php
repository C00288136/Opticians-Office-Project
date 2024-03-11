
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend View Customer</title>
    <link rel="stylesheet" type="text/css" href="amend.css">
    <script src="amend.js"></script>
    </style>
</head>
<body>

<div class="container">
<h1>Amend/View a Person</h1>
<h4>Please select a person and then click the amend button if you wish to update</h4>

<?php include 'listbox.php';?>

    <p id="display"></p>
    <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">
    
    <form  action= "ViewAmend.php" onsubmit="return confirmCheck()" method="post">
        
    <label for="amendid">Person Id</label>
    <input type="text" name="amendid" id="amendid" disabled>
    
    <label for="amendname">Name </label>
    <input type="text" name="amendname" id="amendname" disabled>
    
    <label for="amendaddress">Address </label>
    <input type="text" name="amendaddress" id="amendaddress" disabled>

    <label for="amendeircode">Eir Code </label>
    <input type="text" name="amendeircode" id="amendeircode" onchange="validateForm()" disabled>
    
    
    <label for="amendDOB">Date of Birth</label>
    <input type="date" name="amendDOB" id="amendDOB" title="format us dd-mm-yyyy" onchange="validateForm()" disabled>
    
    <label for="amendPhone">Number</label>
    <input type="text" name="amendPhone" id="amendPhone" disabled>


    <label for="balance">Balance</label>
    <input type="text" name="balance" id="balance" disabled>
    <br><br>

    <div id="error-message"></div>

    <input type="submit" id="button" value="Save Changes">
</form>

</div>

</body>
</html>