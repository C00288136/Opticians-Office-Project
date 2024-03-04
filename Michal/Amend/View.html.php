
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend View Customer</title>
    <link rel="stylesheet" type="text/css" href="layout.css">
    <link rel="stylesheet" href="style.css">
    </style>
</head>
<body>

<div class="container">
<h1>Amend/View a Person</h1>
<h4>Please select a person and then click the amend button if you wish to update</h4>

<?php include 'listbox.php';?>

<script>
    function populate(){
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;

    // i edited the separator for the data fields because my addresses had the , field
    var personalDetails = result.split('|');
    document.getElementById("display").innerHTML = "The details of the selected person are :" + result;
    document.getElementById("amendid").value = personalDetails[0];
    document.getElementById("amendname").value = personalDetails[1];
    document.getElementById("amendaddress").value = personalDetails[2];
    document.getElementById("amendeircode").value = personalDetails[3];
    // this code is needed to split the date by the - and then reversing and joining it together to change the format to y-m-d
    document.getElementById("amendDOB").value = personalDetails[4].split("-").reverse().join("-")
    document.getElementById("amendPhone").value = personalDetails[5];
    document.getElementById("balance").value =personalDetails[6];
    }

    function toggleLock(){

        if (document.getElementById("amendViewbutton").value == "Amend Details")
        {
            document.getElementById("amendname").disabled = false;
            document.getElementById("amendaddress").disabled = false;
            document.getElementById("amendeircode").disabled = false;
            document.getElementById("amendDOB").disabled = false;
            document.getElementById("amendPhone").disabled = false;
            document.getElementById("amendViewbutton").value = "View Details";
        }
        else{
            document.getElementById("amendname").disabled = true;
            document.getElementById("amendaddress").disabled = true;
            document.getElementById("amendeircode").disabled = true;
            document.getElementById("amendDOB").disabled = true;
            document.getElementById("amendPhone").disabled = true;
            document.getElementById("amendViewbutton").value = "Amend Details";
        }
    }

    function confirmCheck() {
    const birthdate = new Date(document.getElementById('amendDOB').value);
    var name = document.getElementById("amendname").value
    var address = document.getElementById("amendaddress").value;
    var eircode = document.getElementById("amendeircode").value;
    var phone = document.getElementById("amendPhone").value;

    var response = confirm(`Are you sure you want to save these changes?\nName: ${name}\nAddress: ${address}\nEir Code: ${eircode}\nDate of Birth: ${birthdate}\nPhone Number: ${phone}`);
    
    if (response) {
        document.getElementById("amendid").disabled = false;
        document.getElementById("amendname").disabled = false;
        document.getElementById("amendaddress").disabled = false;
        document.getElementById("amendeircode").disabled = false;
        document.getElementById("amendDOB").disabled = false;
        document.getElementById("amendPhone").disabled = false;
        return true;
    } else {
        populate();
        toggleLock();
        return false;
    }
}

    </script>
    
    
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
    <input type="text" name="amendeircode" id="amendeircode" disabled>
    
    
    <label for="amendDOB">Date of Birth</label>
    <input type="date" name="amendDOB" id="amendDOB" title="format us dd-mm-yyyy" disabled>
    
    <label for="amendPhone">Number</label>
    <input type="text" name="amendPhone" id="amendPhone" disabled>


    <label for="balance">Balance</label>
    <input type="text" name="balance" id="balance" disabled>
    <br><br>

    <input type="submit" id="button" value="Save Changes">
</form>

</div>

</body>
</html>