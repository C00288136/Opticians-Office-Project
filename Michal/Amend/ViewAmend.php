<?php 
include 'db.con.php';

date_default_timezone_set('UTC');
$dbDate = date("Y-m-d", strtotime($_POST['amendDOB'])); //to match date format in database

$sql = "UPDATE patient SET  Name = '$_POST[amendname]', Address = '$_POST[amendaddress]', Eircode = '$_POST[amendeircode]', DOB = '$dbDate', Phone = '$_POST[amendPhone]' WHERE PatientID = '$_POST[amendid]' ";

if (!mysqli_query($con,$sql)){
    echo 'Error' . mysqli_error($con);
}
else
{
    if (mysqli_affected_rows($con ) != 0){
        echo mysqli_affected_rows($con). "record(s) updated <BR>";
        echo "Person Id " . $_POST['amendid'] . ", " . $_POST['amendname'] . " has been updated";
    }
    else{
        echo "No records were changed";
    }
}


mysqli_close($con);
?>
<script>alert('A record has been changed for <?php  echo $_POST["amendname"];?>.');
window.location.href = "View.html.php"
</script>