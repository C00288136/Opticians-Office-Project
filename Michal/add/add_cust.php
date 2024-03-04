<?php
    include 'db.con.php';
    date_default_timezone_set("UTC");

    $sql = "INSERT into Patient (Name,Address,Eircode,DOB,Phone) VALUES   ('$_POST[name]','$_POST[Address]','$_POST[eircode]','$_POST[dob]','$_POST[PhoneNum]')";
//uses info form insert.html and runs a sql query to add the data into the table
    if (!mysqli_query($con,$sql))
    {
        die("An error in the SQL Query: " .mysqli_error($con));

    }
    //successfully added message 
    echo "<BR> A record has been added for " . $_POST['name'] . " .";

    mysqli_close($con)
    ?>

<script>alert('A record has been added for <?php  echo $_POST["name"];?>.');
window.location.href = "Add_Customer.html"
</script>

   