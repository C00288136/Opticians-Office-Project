
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
        var result = confirm("Item: " + stocknumber + " - " + description + " are the updated details . Are you sure?");
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
    var stockDetails = result.split(',');
    document.getElementById("display").innerHTML = "The details of the selected stock are: <br>" + result;
    document.getElementById("amendid").value = stockDetails[0];
    document.getElementById("amenddescription").value = stockDetails[1];
    document.getElementById("amendcost").value = stockDetails[2];
    document.getElementById("amendretail").value = stockDetails[3];
	document.getElementById("amendreorder").value = stockDetails[4];
    document.getElementById("amendname").value = stockDetails[5];
}
function toggleLock()
{
    if(document.getElementById("amendViewButton").value == "Amend Details")
    {
        document.getElementById("amenddescription").disabled = false;
        document.getElementById("amendcost").disabled = false;
        document.getElementById("amendretail").disabled = false;
		document.getElementById("amendreorder").disabled = false;
        document.getElementById("amendname").disabled = false;
        document.getElementById("amendViewButton").value = "View Details";
    }
    else
    {
        document.getElementById("amenddescription").disabled = true;
        document.getElementById("amendcost").disabled = true;
        document.getElementById("amendretail").disabled = true;
		document.getElementById("amendreorder").disabled = true;
        document.getElementById("amendname").disabled = true;
        document.getElementById("amendViewButton").value = "Amend Details";
    }
}
function confirmCheck()
{
    var response;
    
    var selectedValue = $('#listbox').val(); // Get the selected value of the dropdown
    if (selectedValue === null) {
        alert("No option chosen");
        return false;
    }
    response = confirm('Are you sure you want to save these changes?');
    if(response)
    {
        document.getElementById("amendid").disabled = false;
        document.getElementById("amenddescription").disabled = false;
        document.getElementById("amendcost").disabled = false;
        document.getElementById("amendretail").disabled = false;
        document.getElementById("amendname").disabled = false;
		document.getElementById("amendreorder").disabled = false;
        return true;
    }
    return false;
}
