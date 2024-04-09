<?php   
    include "../../db.inc.php";

    date_default_timezone_set('UTC');
    $sql = "UPDATE inventory SET Description = '{$_POST['amenddescription']}',CostPrice = '{$_POST["amendcost"]}',RetailPrice = '{$_POST["amendretail"]}',ReorderQty = '{$_POST["amendretail"]}', SupplierID = '{$_POST["amendname"]}'  WHERE StockNumber = '$_POST[amendid]'";
    
    if(!mysqli_query($con, $sql))
    {
        echo "Error". mysqli_error($con);
    }
    else
    {
        if(mysqli_affected_rows($con) != 0)
        {
            echo mysqli_affected_rows($con)." record(s) updated <br>";
            echo "Stock Number ".$_POST['amendid'].", ".$_POST['amenddescription']."has been updated";
        }
        else
        {
            echo "No records were changed";
        }
    }
    mysqli_close($con);
    ?>
<form action="AmendView.html.php" method="post">
<input type="submit" value="Return to Previous Screen">
</form>