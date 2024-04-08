function validateDecimal(input){
    var value = input.value;
    if (value.indexOf('.') !== -1) {
        // Split the value into integer and decimal parts
        var parts = value.split('.');
        // Check if the decimal part has more than two digits
        if (parts[1].length > 2) {
            // Display error message
            // Focus on the input field again
            return false;
        }
        else
            return true;
    }
    else 
        return true;
}
function validateCost(){
    var costInput = document.getElementById("cost");
    var cost = parseFloat(costInput.value);
    var errorMsg = document.getElementById("errorMsg");

    if(cost<=0){
        errorMsg.textContent = "Values must be greater than 0";
        costInput.style.border = "2px solid red";
        return false;
    }
    else if(!validateDecimal(costInput)){
        errorMsg.textContent = "Can't be more than two decimal places";
        costInput.style.border = "2px solid red";
        return false;
    }
    else{
        return true;
    }
}
function validateRetail(){
    var retailInput = document.getElementById("retail");
    var retail = parseFloat(retailInput.value);
    var errorMsg = document.getElementById("errorMsg");

    if(retail<=0){
        errorMsg.textContent = "Values must be greater than 0";
        retailInput.style.border = "2px solid red";
        return false;
    }
    else if(!validateDecimal(retailInput)){
        errorMsg.textContent = "Can't be more than two decimal places";
        retailInput.style.border = "2px solid red";
        return false;
    }
    else{
        return true;
    }
}
//Clear Form
function Clear(){
    var errorMsg = document.getElementById("errorMsg");
    var codeInput = document.getElementById("stockcode");
    var retailInput = document.getElementById("retail");
    var reorderInput = document.getElementById("reorder");
    var costInput = document.getElementById("cost");
    errorMsg.textContent = "";
    costInput.style.border = "2px solid black";
    retailInput.style.border = "2px solid black";
    reorderInput.style.border = "2px solid black";
    codeInput.style.border = "2px solid black";
}

function validate() {

    var reorderInput = document.getElementById("reorder");
    var codeInput = document.getElementById("stockcode");
    var costInput = document.getElementById("cost");
    var cost = parseFloat(costInput.value);
    var retailInput = document.getElementById("retail");
    var retail = parseFloat(retailInput.value);
    var errorMsg = document.getElementById("errorMsg");
    Clear();    

    if(parseInt(codeInput.value)<=0){
        codeInput.style.border = "2px solid red";
        errorMsg.textContent = "Values must be greater than 0";
    }
    if(parseInt(reorderInput.value)<=0){
        reorderInput.style.border = "2px solid red";
        errorMsg.textContent = "Values must be greater than 0";
    }
    validateRetail();
    validateCost();
    if(validateCost() && validateRetail()){
        if(cost>=retail){
        errorMsg.textContent = "Cost Price can't be greater than Retail Price";
        retailInput.style.border = "2px solid red";
        }
    }
}

function checkSubmit(){
    var errorMsg = document.getElementById("errorMsg");
    if(errorMsg.textContent == ""){
        response = confirm("Confirm That these are the correct details ");
        if(response){
            return true;
        }
        else
            return false;   
    }
    else 
        return false;
}
