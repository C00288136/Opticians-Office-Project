<?php
include '../db.con.php';

$sql = "SELECT * FROM patient WHERE deleted_flag = 0";

if (!$result = mysqli_query($con, $sql)) {
    die('Error in querying the database: ' . mysqli_error($con));
}

echo "<br><select name='listbox' id='listbox'>";
echo "<option value='' disabled selected>Select a patient</option>";

while ($row = mysqli_fetch_assoc($result)) {
    // Sanitize the output to prevent XSS attacks
    $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');

    echo "<option value='$name'>$name</option>";
}
echo "</select>";

mysqli_free_result($result); // Free the result set
mysqli_close($con); // Close the database connection
?>
