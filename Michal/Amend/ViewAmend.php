<?php 
include '../db.con.php';

date_default_timezone_set('UTC');
$dbDate = date("Y-m-d", strtotime($_POST['amendDOB'])); //to match date format in the database

$sql = "UPDATE patient SET  Name = '$_POST[amendname]', Address = '$_POST[amendaddress]', Eircode = '$_POST[amendeircode]', DOB = '$dbDate', Phone = '$_POST[amendPhone]' WHERE PatientID = '$_POST[amendid]' ";
$result = mysqli_query($con, $sql);
$affectedRows = mysqli_affected_rows($con);

if (!$result){
    echo 'Error' . mysqli_error($con);
}

$message = "A record has been changed for ";
if ($affectedRows != 0){
    $message .= $affectedRows . " record(s) updated \nPerson Id " . $_POST['amendid'] . ", " . "\n".$_POST['amendname'] . " has been updated";
} else {
    $message = " No records were changed";
}

mysqli_close($con);
?>
<script>
    var message = <?php echo json_encode($message, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>;
    alert(message);
    window.location.href = "View.html.php";
</script>
