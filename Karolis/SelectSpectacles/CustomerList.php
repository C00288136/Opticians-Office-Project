<!-- 
    Karolis Grigaliunas
    C00287940
    ListBox for Patients
 -->

 <!-- IMPORT jQuery libraries for select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<?php
// connection
    include "../../db.con.php";
    //query to get patient details and test
    $sql = "SELECT patient.PatientID, patient.Name, patient.Address, patient.DOB, test.RightEye, 
    test.LeftEye, test.TestDate FROM patient LEFT JOIN test 
    ON patient.PatientID = test.PatientID WHERE patient.deleted_flag = 0;";
// error output
    if (!$result = mysqli_query($con, $sql)) {
        die('Error in querying the database: ' . mysqli_error($con));
    }
// select populate
    echo "<br><select name='listbox' id='listbox'>";
    echo "<option value='' disabled selected>Select an option</option>";
// set values for select 
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['PatientID'];
        $name = $row['Name'];
        $address = $row['Address'];
        $dob = $row['DOB'];
        $lefteye = $row['LeftEye'];
        $righteye = $row['RightEye'];
        $testdate = $row['TestDate'];
        $allText= "$id,$name,$address,$dob,$lefteye,$righteye,$testdate";

        echo "<option value='$allText'>$name</option>";
    }
    echo "</select>";

    mysqli_close($con);
?>
<!-- link javascript -->
<script src="./SelectSpectacles.js"></script>
<script>
$(document).ready(function() {      //Calls function when html site is fully loaded
        $('.stockdesc').select2({       //Chooses select field with class 'stockdesc' and makes changes for select2
        placeholder: 'Select an option' //When loads if no option is selected off the places message
        });
    // Call the populate function when an option is selected
    $('#listbox').on('change', function() {
        populate();
    });
});
</script>