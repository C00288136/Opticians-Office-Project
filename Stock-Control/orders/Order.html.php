<!-- 
Student Number : C00288136
Purpose: HTML form for orders
Date: 12/04/24
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Items</title>
    <link rel="stylesheet" type="text/css" href="order.css">
<script src="order.js"></script>
<!-- script to include jquery library -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script></head>
<body>

<header>
        <div class="logo">
            <img src="../../assets/logo.webp" alt="">
            <p class="logo">Optician Portal</p>
        </div>
    </header>

<div class="container">

<nav>
            <!-- nav for quick naviation back the main menu -->
            <ul>
            <a href="../../index.html">
                    <li>Home</li>
                </a>
                    <a href="">
                        <li>Counter Sales</li>
                    </a>
                    <a href="">
                        <li>Spectacle Sales</li>
                    </a>
                    <a href="../../Eye-Test-Menu/eyeTestMenu.html">

                    <li>Eye Test Menu</li>
                </a>
                <a href="../StockMaintenance.html">
                    <li>Stock Control</li>
                </a>
                <a href="../../File-Maintenance/FileMaintenance.html">
                        <li>File Maintenance</li>
                    </a>
            </ul>
        </nav>
        
        <div class="content">
<h1>Make Order</h1>

<form>
    <!-- form includes supplier listbox for a list of available supplier which gets posted to retrieve the items they sell -->
<?php include 'supplierListBox.php';?>
    <input type="button" value="Select Supplier" id="submitSup">
    <input type="hidden" id="supplier"  name="supplier">
</form>

<!-- prints off the items that were retrieved from the sql query in SupplierListBox -->
<div id="itemsTable" hidden></div>
<!-- second form used for posting order data which will get inserted into the db -->
<form action="Order.php"   onsubmit="return confirmCheck()" method="post" id="mainform">
</form>

</div>
</div>

<script>
    // added a action listener to the supplier list box created by the php file
    // on click a value of the Supplier ID is saved so it can be posted by the ajax function
document.getElementById("Suplistbox").addEventListener("click",function(){
    var selectedValue = this.value;
    var supplierparts = selectedValue.split(",")
    var supplierID = supplierparts[0];
    document.getElementById("supplier").value = supplierID;
    console.log(supplierID)
  
});
// .ready used by the query to send data everything stored inside the function tag
$(document).ready(function(){
//      this function will store all the variable and data send over on click 
    $("#submitSup").click(function(){

        // saves the value saved in the hidden supplierid as supplier in the function
        let supplierID = $("#supplier").val();

        // fucntion doesnt run if supplierid is empty
        if(supplierID ==''){
            return false
        }

        $.ajax({
            type: "POST", //method of posting
            url: "itemListbox.php", //destination
            data: {
                supplierID : supplierID //data object which is being sent over
            },
            success: function(data){
                // upon success a function runs which takes in a data set and updates the content of the itemsTable element with the data
                $("#itemsTable").html(data);
                // function is ran to build the table inside of the form
                createFormFields();
            }
        });   
    })
});
</script>
</body>
</html>
