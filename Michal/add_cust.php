<?php
    include 'db.con.php';
    date_default_timezone_set("UTC");


    echo "The details sent down are : <BR>";
    echo "First name is : " . $_POST['name'] . "<BR>";
    echo "Address is : " . $_POST["Address"] . "<BR>";




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

    <form action="Add_Customer.html" method="post">
        <br>
        <input type="submit" value="Return to Insert Page" name="" id="">
    </form>