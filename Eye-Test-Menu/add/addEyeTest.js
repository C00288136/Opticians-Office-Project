function populate() {
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;

    var personalDetails = result.split(',');
    document.getElementById("PatientID").value = personalDetails[0];
}