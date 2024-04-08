
window.onload = function(){
    populate();
}
// Validation check
function submitCheck(){
    var stocknumber = document.getElementById("stocknumber").value;
    var description = document.getElementById("description").value;
    var selectedValue = $('#listbox').val(); // Get the selected value of the dropdown
    if (selectedValue === '') {
        alert("No option chosen")
        return false;
    }
    else{
        var stocknumber = document.getElementById("stocknumber").value;
        var description = document.getElementById("description").value;
        var result = confirm("Item: " + stocknumber + " - " + description + " will be deleted. Are you sure?");
        if(result)
            return true;
        else
            return false;
    }
}


function populate()
{
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;
    var personDetails = result.split(',');
    document.getElementById("display").innerHTML = "The details of the selected person are: <br>" + result;
    document.getElementById("amendid").value = personDetails[0];
    document.getElementById("amendfirstname").value = personDetails[1];
    document.getElementById("amendlastname").value = personDetails[2];
    document.getElementById("amendDOB").value = personDetails[3];
	document.getElementById("amendemail").value = personDetails[4];
}
function toggleLock()
{
    if(document.getElementById("amendViewButton").value == "Amend Details")
    {
        document.getElementById("amendfirstname").disabled = false;
        document.getElementById("amendlastname").disabled = false;
        document.getElementById("amendDOB").disabled = false;
		document.getElementById("amendemail").disabled = false;
        document.getElementById("amendViewButton").value = "View Details";
    }
    else
    {
        document.getElementById("amendfirstname").disabled = true;
        document.getElementById("amendlastname").disabled = true;
        document.getElementById("amendDOB").disabled = true;
		document.getElementById("amendemail").disabled = true;
        document.getElementById("amendViewButton").value = "Amend Details";
    }
}
function confirmCheck()
{
    var response;
    response = confirm('Are you sure you want to save these changes?');
    var selectedValue = $('#listbox').val(); // Get the selected value of the dropdown
    if (selectedValue === '') {
        alert("No option chosen");
        populate();
        toggleLock();
        return false;
    }
    else if(response)
    {
        document.getElementById("amendid").disabled = false;
        document.getElementById("amendfirstname").disabled = false;
        document.getElementById("amendlastname").disabled = false;
        document.getElementById("amendDOB").disabled = false;
		document.getElementById("amendemail").disabled = false;
        return true;
    }
}
