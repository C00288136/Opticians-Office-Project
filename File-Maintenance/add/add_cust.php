<?php
/* Name: Michal Kuras
Student Number : C00288136
Purpose: PHP file used after the post of the form to insert  a new patient into the database
Date: 01/03/24
*/
    include '../../db.con.php';//db connector
    date_default_timezone_set("UTC");
// sql query created to find the last patient id and save the next available
    $countQuery = "SELECT MAX(PatientID) as max from Patient ";
    $result = mysqli_query($con,$countQuery);

    if ($result){
        $row = mysqli_fetch_assoc($result);
        $nextPrimaryKey = $row['max'] + 1;

    }
    else{
        die("Error getting the next available primary key");
    }

    $sql = "INSERT into Patient (PatientID, Name,Address,Eircode,DOB,Phone) VALUES   ('$nextPrimaryKey','$_POST[name]','$_POST[Address]','$_POST[eircode]','$_POST[dob]','$_POST[PhoneNum]')";
//uses info form insert.html and runs a sql query to add the data into the table
    if (!mysqli_query($con,$sql))
    {
        die("An error in the SQL Query: " .mysqli_error($con));

    }
    //successfully added message 
    echo "<BR> A record has been added for " . $_POST['name'] . " .";

    mysqli_close($con)
    ?>

<!-- script to send the user back to the insert page after a user is inserted into the db -->
<script>alert('A record has been added for <?php  echo $_POST["name"];?>.');
window.location.href = "Add_Customer.html"
</script>

   