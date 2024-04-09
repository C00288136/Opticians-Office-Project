/* Name: Michal Kuras
Student Number : C00288136
Purpose: JS used for validating the Form so the variables are inserts as needed for the db
Date: 01/03/24
*/
function validateForm(){
  console.log("running")
  // made variable declarations so i can display them in the alert before submitting
  const birthdate = new Date(document.getElementById('dob').value);
  const today = new Date();

     //error message made for the age restriction
     var errorMessage = document.getElementById("error-message");
     errorMessage.innerHTML = "";

    //  birth date calculation, i decided that a customer added cannot be less than a year old also a date in the future is invalid
	if (birthdate > today)
    errorMessage.innerHTML += "Invalid date<BR>"
    else if (today - birthdate < 1 *365 * 24 * 60 *60 * 1000)
    errorMessage.innerHTML += "Patient must be as least 1 year old to sign up<BR>"


    // the pattern wasnt working in html so i created a js pattern which gets checked upon change of the eircode field
    var eircode = document.getElementById("eircode").value;
    var pattern = /^[A-Za-z][0-9]{2}[A-Za-z0-9]{4}$/;
    if (!pattern.test(eircode)){
      errorMessage.innerHTML += "The eircode format in incorrect (e.g. A32 2345)<br>"
    }
    

// var grabs the id of the submit button and the if statment disables is if the errormessage div is not empty 
// prevents the user of submtiting the form if incorrect info is provided
      var button = document.getElementById("submit") 
    //the first statement is used to make sure there is no error 
if (errorMessage.innerHTML === "") {
    button.removeAttribute("disabled");
    }
 else {
    button.setAttribute("disabled", "true");
}

}
function submitForm() {
  // alert for submitting the form to give the user one more chance to look over the data they are submitting
    const birthdate = new Date(document.getElementById('dob').value).toLocaleDateString();//toLocalDateString used to get a short version of the date string only what they user entered
    var name = document.getElementById("name").value
    var address = document.getElementById("Address").value;
    var eircode = document.getElementById("eircode").value;
    var phone = document.getElementById("PhoneNum").value;

    console.log("submit")
    var confirmation = confirm(`Do you want to add this user to the database?\nName: ${name}\nAddress: ${address}\nEir Code: ${eircode}\nDate of Birth: ${birthdate}\nPhone Number: ${phone}`);
    if(confirmation){
      document.getElementById("form").submit();
    }
    return false
  }

  