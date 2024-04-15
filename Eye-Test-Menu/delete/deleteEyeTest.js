function populate() {
    var sel = document.getElementById("testIDlistbox");
    var result = sel.options[sel.selectedIndex].value;
    console.log(result);
    var patientDetails = result.split(',');
    console.log(patientDetails);
    document.getElementById("TestID").value = patientDetails[0];
    document.getElementById("RightEye").value = patientDetails[1];
    document.getElementById("LeftEye").value = patientDetails[2];
    document.getElementById("TestDate").value = patientDetails[3];
}