<?php 
include 'db.inc.php';

date_default_timezone_set('UTC');
$dbDate = date("Y-m-d", strtotime($_POST['amendDOB'])); //to match date format in database

$sql = "UPDATE student SET  StudentName = '$_POST[amendname]', StudentAddress = '$_POST[amendaddress]', StudentPhone = '$_POST[amendphone]' , GradePointAverage = '$_POST[amendgrade]', DOB = '$dbDate', YearBeganCourse = '$_POST[amendyearstart]', CourseCode = '$_POST[amendcourse]' WHERE StudentId = '$_POST[amendid]' ";

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
<form action="Amendview.html.php" method="post"/>
<input type="submit" value="Return to Previous Screen"> 
</form>