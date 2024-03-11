
function validateForm(){
  console.log("running")
  // made variable declarations so i can display them in the alert before submitting
  const birthdate = new Date(document.getElementById('dob').value);
  const today = new Date();

     //error message made for the age restriction
     var errorMessage = document.getElementById("error-message");
     errorMessage.innerHTML = "";

	if (birthdate > today)
    errorMessage.innerHTML += "Invalid date"
    else if (today - birthdate < 1 *365 * 24 * 60 *60 * 1000)
    errorMessage.innerHTML += "Patient must be as least 1 year old to sign up"
    


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
    const birthdate = new Date(document.getElementById('dob').value);
    const today = new Date();
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
