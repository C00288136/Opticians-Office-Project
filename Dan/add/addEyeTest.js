function validateForm() {
    var rightEyeValue = parseFloat(document.getElementById("RightEye").value);
    var leftEyeValue = parseFloat(document.getElementById("LeftEye").value);

    if (isNaN(rightEyeValue) || isNaN(leftEyeValue)) {
        alert("Please enter valid numbers for the eyes.");
        return false;
    }

    if (rightEyeValue < -6.00 || rightEyeValue > 6.00 || leftEyeValue < -6.00 || leftEyeValue > 6.00) {
        alert("Eye values must be between -6.00 and +6.00.");
        return false;
    }

    return true;
}