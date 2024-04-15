<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="deleteEyeTest.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="deleteeyeTest.js"></script>
    <title>Opticians Menu</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../../assets/logo.webp">
            <p class="logo">Optician Portal</p>
        </div>
    </header>
    <div class="container">
        <div class="navBar">
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="#countersales">Counter Sales</a></li>
                <li><a href="#spectaclesales">Spectacle Sales</a></li>
                <li><a href="#eyetestmenu">Eye Test Menu</a></li>
                <li><a href="#stockcontrol">Stock Control</a></li>
            </ul>
        </div>
        <div class="form-container">
            <form action="deleteEyeTest.php" method="post">
                <div class="input-container">
                    <label for="PatientID">Please select the entry you want deleted</label>
                    <?php
                        if(isset($_SESSION["deleted_testID"])) {
                            echo "<h1>Test ID ".$_SESSION["deleted_testID"]." deleted successfully!</h1>";
                            // Unset the session variable to remove the message after displaying it
                            unset($_SESSION["deleted_testID"]);
                        }
                    ?>
                    <?php include 'listbox.php';?>
                    <?php include 'testIDlistbox.php';?>
                    <label for="TestID">Test ID: </label>
                    <input type="number" id="TestID" name="TestID" required >
                    
                    <label for="RightEye">Right eye:</label>
                    <input type="text" id="RightEye" name="RightEye" required >
                    
                    <label for="LeftEye">Left eye:</label>
                    <input type="text" id="LeftEye" name="LeftEye" required >
                    
                    <label for="TestDate">Test Date:</label>
                    <input type="date" id="TestDate" name="TestDate" required><br><br>

                    <input type="submit" value="Delete">
                    <input type="reset" value="Reset">
                </div>
            </form>
        </div>

    </div>
    <script>
    $(document).ready(function(){
        $("#listbox").change(function(){
            var selectedValue = $(this).val();
            var patientID = selectedValue.split(",")[0];

            $.ajax({
                type: "POST",
                url: "testIDlistbox.php",
                data: { patientID: patientID },
                success: function(data){
                    $("#testIDlistbox").html(data);
                }
            });   
        });
    });
</script>
    </script>
</body>
</html>