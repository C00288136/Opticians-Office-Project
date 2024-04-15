    // Karolis Grigaliunas
    // C00287940
    // SelectSpectacles Javascript

// Validation check

function populate()
{
    // populate fields
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;
    console.log(result)
    var patientDetails = result.split(',');
    document.getElementById("display").innerHTML = "The details of the selected patient are: <br>" + result; 
    document.getElementById("name").value = patientDetails[1];
    document.getElementById("address").value = patientDetails[2];
    document.getElementById("dob").value = patientDetails[3];
    document.getElementById("lefteye").value = patientDetails[4];
    document.getElementById("righteye").value = patientDetails[5];
    document.getElementById("testdate").value = patientDetails[6];
}
function confirmCheck()
{
    var response;
    // check that value has been chosen
    var selectedValue = $('#listbox').val(); // Get the selected value of the dropdown
    if (selectedValue === null) {
        alert("No option chosen");
        return false;
    }
    response = confirm('Are you sure you want to make this order');
    if(response)
    {
        return true;
    }
    return false;
}
