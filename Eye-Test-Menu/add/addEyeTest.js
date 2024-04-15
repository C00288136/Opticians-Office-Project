/* Name: Daniel Mccormack
Student Number : C00287277
Purpose: Js used to populate customer id field with customer id found in our table
Date: 01/03/24
*/

function populate() {
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;

    var personalDetails = result.split(',');
    document.getElementById("PatientID").value = personalDetails[0];
}