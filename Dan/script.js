function validateForm()
{
    var RightEye = parseFloat(document.getElementById('RightEye'));
    var LeftEye = parseFloat(document.getElementById('LeftEye'));
    var TestDate = new Date(document.getElementById('TestDate').value);
    var todayDate = new Date();

    if (!isNaN(RightEye) && isFinite(RightEye) && RightEye % 1 !== 0)
    if (isNaN(LeftEye))
    {
        alert("Right eye is not a float!");
        return false;
    }
    if (TestDate > todayDate)
    {
        alert("Invalid Date. Please check again");
        return false;
    }

}