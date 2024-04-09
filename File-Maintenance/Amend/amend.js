/* Name: Michal Kuras
Student Number : C00288136
Purpose: JS scripts used for populating the input fields as well as locking them from being changed and validating that the data entered is correct
Date: 10/03/24
*/
function populate(){
    // these 3 lines select the listbox and read the data from it
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

function validateForm(){
    console.log("running")
    // made variable declarations so i can display them in the alert before submitting
    const birthdate = new Date(document.getElementById('amendDOB').value);
    const today = new Date();

    var eircode = document.getElementById("amendeircode").value;
    var pattern = /^[A-Za-z][0-9]{2}[A-Za-z0-9]{4}$/;
  
       //error message made for the age restriction
       var errorMessage = document.getElementById("error-message");
       errorMessage.innerHTML = "";
  
      if (birthdate > today)
      errorMessage.innerHTML += "Invalid date<br>"
      else if (today - birthdate < 1 *365 * 24 * 60 *60 * 1000)
      errorMessage.innerHTML += "Patient must be as least 1 year old to sign up<br>"

      if (!pattern.test(eircode)){
        errorMessage.innerHTML += "The eircode format in incorrect (e.g. A32 2345)<br>"
      }
      
        var button = document.getElementById("amendViewbutton") 
        var savebutton = document.getElementById("button")
      //the first statement is used to make sure there is no error 
  if (errorMessage.innerHTML === "") {
      button.removeAttribute("disabled");
      savebutton.removeAttribute("disabled")
      }
   else {
      button.setAttribute("disabled", "true");
      savebutton.setAttribute("disabled", "true");
  }
  
}