
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
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

    // i edited the seperator for the data fields because my addresses had the , field
    var personalDetails = result.split('|');
    document.getElementById("display").innerHTML = "The details of the selected person are :" + result;
    document.getElementById("amendid").value = personalDetails[0];
    document.getElementById("amendname").value = personalDetails[1];
    document.getElementById("amendaddress").value = personalDetails[2];
    document.getElementById("amendphone").value = personalDetails[3];
    document.getElementById("amendgrade").value = personalDetails[4];
    document.getElementById("amendDOB").value = personalDetails[5];
    document.getElementById("amendyearstart").value = personalDetails[6];
    document.getElementById("amendcourse").value =personalDetails[7];
    }

    function toggleLock(){

        if (document.getElementById("amendViewbutton").value == "Amend Details")
        {
            document.getElementById("amendname").disabled = false;
            document.getElementById("amendaddress").disabled = false;
            document.getElementById("amendphone").disabled = false;
            document.getElementById("amendgrade").disabled = false;
            document.getElementById("amendDOB").disabled = false;
            document.getElementById("amendyearstart").disabled = false;
            document.getElementById("amendcourse").disabled = false;
            document.getElementById("amendViewbutton").value = "View Details";
        }
        else{
            document.getElementById("amendname").disabled = true;
            document.getElementById("amendaddress").disabled = true;
            document.getElementById("amendphone").disabled = true;
            document.getElementById("amendgrade").disabled = true;
            document.getElementById("amendDOB").disabled = true;
            document.getElementById("amendyearstart").disabled = true;
            document.getElementById("amendcourse").disabled = true;
            document.getElementById("amendViewbutton").value = "Amend Details";
        }
    }

    function confirmCheck(){
        var response;
        response = confirm('Are you sure you want to save these changes?');
        if (response){
            document.getElementById("amendid").disabled = false
            document.getElementById("amendname").disabled = false
            document.getElementById("amendaddress").disabled = false
            document.getElementById("amendphone").disabled = false
            document.getElementById("amendgrade").disabled = false
            document.getElementById("amendDOB").disabled = false
            document.getElementById("amendyearstart").disabled = false
            document.getElementById("amendcourse").disabled = false
            return true;
        }
        else{
            populate();
            toggleLock();
            return false;
        }
    }
    </script>
    
    
    <p id="display"></p>
    <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">
    
    <form  action= "Amendview.php" onsubmit="return confirmCheck()" method="post">
        
    <label for="amendid">Person Id</label>
    <input type="text" name="amendid" id="amendid" disabled>
    
    <label for="amendname">Name </label>
    <input type="text" name="amendname" id="amendname" disabled>
    
    <label for="amendaddress">Address </label>
    <input type="text" name="amendaddress" id="amendaddress" disabled>
    
    <label for="amendphone">Number</label>
    <input type="text" name="amendphone" id="amendphone" disabled>
    
    <label for="amendgrade">Average Grade</label>
    <input type="text" name="amendgrade" id="amendgrade" disabled>
    
    <label for="amendDOB">Date of Birth</label>
    <input type="date" name="amendDOB" id="amendDOB" title="format us dd-mm-yyyy" disabled>
    
    <label for="amendyearstart">Starting year</label>
    <input type="text" name="amendyearstart" id="amendyearstart" disabled>
    
    <label for="amendcourse">Course Code</label>
    <input type="text" name="amendcourse" id="amendcourse" disabled>
    <br><br>
    <input type="submit" id="button" value="Save Changes">
</form>

</div>

</body>
</html>