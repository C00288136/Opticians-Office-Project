<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Person</title>
    <link rel="stylesheet" type="text/css" href="delete.css">
    <script>
        function populate(){

console.log("populate called")
var sel = document.getElementById("listbox");
var result;
result = sel.options[sel.selectedIndex].value;

// i edited the separator for the data fields because my addresses had the , field
var personalDetails = result.split('|');
document.getElementById("display").innerHTML = "The details of the selected person are :" + result;
document.getElementById("deleteid").value = personalDetails[0];
document.getElementById("deleteName").value = personalDetails[1];
document.getElementById("deleteAddress").value = personalDetails[2];
document.getElementById("deleteEircode").value = personalDetails[3];
// this code is needed to split the date by the - and then reversing and joining it together to change the format to y-m-d
document.getElementById("delDOB").value = personalDetails[4].split("-").reverse().join("-")
document.getElementById("deletePhone").value = personalDetails[5];
document.getElementById("delBalance").value =personalDetails[6];
}
    </script>
</head>
<body>

<div class="container">
<h1>Delete Person</h1>

<?php include 'listbox.php';?>

    <p id="display"></p>

    
    <form action="Delete.php" method="post">
        
    <label for="deleteid">Person Id</label>
    <input type="text" name="delid" id="delid">
    
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

</form>

</div>

</body>
</html>
