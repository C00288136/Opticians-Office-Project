function validateForm() {
    var RightEye = parseFloat(document.getElementById('RightEye').value);
    var LeftEye = parseFloat(document.getElementById('LeftEye').value);
    var TestDate = new Date(document.getElementById('TestDate').value);
    var todayDate = new Date();
  
    if (!isFloat(RightEye)) {
      alert("Right eye is not a float!");
    } else if (!isFloat(LeftEye)) {
      alert("Left Eye is not a float!");
    }
    // Additional validation logic can be added here if needed
  }
  function isFloat(value) {
    var floatRegex = /^-?\d*(\.\d+)?$/; // Regular expression for float numbers
    return floatRegex.test(value);
}

function addCustomerPopulate()
{
  //the following will populate the table when 
}
