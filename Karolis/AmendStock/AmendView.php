<?php   
    include "../../db.inc.php";

    date_default_timezone_set('UTC');
    $dbDate = date("Y-m-d", strtotime($_POST['amendDOB']));

    $sql = "UPDATE inventory SET firstname = '{$_POST['amendfirstname']}',lastname = '{$_POST["amendlastname"]}', DOB = '$dbDate',email = '{$_POST["amendemail"]}',phone = '{$_POST["amendphone"]}' WHERE personsID = '$_POST[amendid]'";
    
    if(!mysqli_query($con, $sql))
    {
        echo "Error". mysqli_error($con);
    }
    else
    {
        if(mysqli_affected_rows($con) != 0)
        {
            echo mysqli_affected_rows($con)." record(s) updated <br>";
            echo "Person ID ".$_POST['amendid'].", ".$_POST['amendfirstname'].", ".$_POST['amendlastname']
            ."has been updated";
        }
        else
        {
            echo "No records were changed";
        }
    }
    mysqli_close($con);
    ?>
<form action="AmendView.html.php" method="post" />
<input type="submit" value="Return to Previous Screen">
</form>