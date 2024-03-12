function validateForm()
{
    var RightEye = parseFloat(document.getElementById('RightEye'));
    var LeftEye = parseFloat(document.getElementById('LeftEye'));
    var TestDate = new Date(document.getElementById('TestDate').value);
    var todayDate = new Date();

    if (isNaN(RightEye) || !isFinite(RightEye) || typeof RightEye !== 'number' || !Number.isInteger(RightEye))
    {
        alert("Right eye is not a float!")
    }
    else if (isNaN(LeftEye) || !isFinite(LeftEye) || typeof LeftEye !== 'number' || !Number.isInteger(LeftEye))
    {
        alert("Left eye is not a float!")
    }
    else if (todayDate > TestDate)
    {
        alert("Date is in the future!");
    }

}