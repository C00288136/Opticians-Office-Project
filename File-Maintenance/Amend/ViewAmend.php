<?php 
/*
Student Number : C00288136
Purpose: PHP post file which receives the amended data from the form and updates them in the database
Date: 10/03/24
 */
include '../../db.con.php';

date_default_timezone_set('UTC');
$dbDate = date("Y-m-d", strtotime($_POST['amendDOB'])); //to match date format in the database

// sql query which updated the data using the data recieved from the post method in the view.html.php
$sql = "UPDATE patient SET  Name = '$_POST[amendname]', Address = '$_POST[amendaddress]', Eircode = '$_POST[amendeircode]', DOB = '$dbDate', Phone = '$_POST[amendPhone]' WHERE PatientID = '$_POST[amendid]' ";
$result = mysqli_query($con, $sql);
$affectedRows = mysqli_affected_rows($con);

if (!$result){
    echo 'Error' . mysqli_error($con);
}
// confirmations that they data was changed by querying the database if any of the rows were afftected by the sql
$message = "Details have been changed for ";
if ($affectedRows != 0){
    $message .= $affectedRows . " record(s) updated \nPerson Id " . $_POST['amendid'] . ", " . "\n".$_POST['amendname'] . " has been updated";
} else {
    $message = " No records were changed";
}

mysqli_close($con);
?>
<script>
    // using a json encode for the php message because it formats the message correctly so the alert is able to display the message
    // without the encode the variables are not seen properly from the php 
    var message = <?php echo json_encode($message); ?>;
    alert(message);
    window.location.href = "View.html.php";
</script>
