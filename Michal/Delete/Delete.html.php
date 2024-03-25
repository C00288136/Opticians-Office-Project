<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Person</title>
    <link rel="stylesheet" type="text/css" href="delete.css">
    <script src="delete.js"></script>
    
</head>
<body>

<div class="container">
<h1>Delete Person</h1>

<?php include 'listbox.php';
// not exactly sure why but i need to create session in here as well as the the delete php
// otherwise i get a error for the session destroy down below
session_start();?>



    <p id="display"></p>

    
    <form action="Delete.php" onsubmit="return confirmCheck()" method="post">
        
    <label for="delid">Person Id</label>
    <input type="text" name="delid" id="delid" disabled>
    
    <label for="deleteName">Name</label>
    <input type="text" name="deleteName" id="deleteName" disabled>
    
    <label for="deleteAddress">Address</label>
    <input type="text" name="deleteAddress" id="deleteAddress" disabled>

    <label for="deleteEircode">Eir Code</label>
    <input type="text" name="deleteEircode" id="deleteEircode"disabled>
    
    <label for="delDOB">Date of Birth</label>
    <input type="date" name="delDOB" id="delDOB" title="format us dd-mm-yyyy" disabled>
    
    <label for="deletePhone">Number</label>
    <input type="text" name="deletePhone" id="deletePhone" disabled>

    <label for="delBalance">Balance</label>
    <input type="text" name="delBalance" id="delBalance" disabled>
    <br><br>

    <div id="error-message"></div>

    <input type="submit" id="button" value="Delete User">


<?php
        if  (isset($_SESSION["patientid"])) {echo "<h1 class='myMessage'>Record deleted for ". $_SESSION["firstname"]. "</h1>";}
        session_destroy();
?>

</form>
</div>


</body>
</html>
