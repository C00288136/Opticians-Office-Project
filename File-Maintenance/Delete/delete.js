/* Name: Michal Kuras
Student Number : C00288136
Purpose: JS used for populating the fields and double checking with the user they want to delete this entry 
Date: 01/03/24
*/
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
                // passes the delid to the post php 
                if (response){       
                        document.getElementById("delid").disabled = false;
                         return true;
                }
                else{
                    populate();
                    return false;
                }
            }

