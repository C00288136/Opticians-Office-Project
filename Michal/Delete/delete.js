function populate(){

    console.log("populate called")
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;
    
    // i edited the separator for the data fields because my addresses had the , field
    var personalDetails = result.split('|');
    document.getElementById("display").innerHTML = "The details of the selected person are :" + result;
    var patientID = personalDetails[0];
    document.getElementById("delid").value = personalDetails[0];
    document.getElementById("deleteName").value = personalDetails[1];
    document.getElementById("deleteAddress").value = personalDetails[2];
    document.getElementById("deleteEircode").value = personalDetails[3];
    // this code is needed to split the date by the - and then reversing and joining it together to change the format to y-m-d
    document.getElementById("delDOB").value = personalDetails[4].split("-").reverse().join("-")
    document.getElementById("deletePhone").value = personalDetails[5];
    document.getElementById("delBalance").value =personalDetails[6];

    }
    
    // used to reenable all the input fields so the data can be passed on in the post process to php
    function confirmCheck(){
        
                var response;
                response = confirm('Are you sure you want to save these changes?');
                if (response){
                    elements = ["delid","deleteName","deleteAddress","deleteEircode","delDOB","deletePhone","delBalance"]
                    for (var i = 0; i < elements.length; i++) {
                        document.getElementById(elements[i]).disabled = false;
                    }
                    return true;
                }
                else{
                    populate();
                    return false;
                }
            }

