<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Items</title>
    <link rel="stylesheet" type="text/css" href="order.css">
<script src="order.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script></head>
<body>

<div class="container">
<h1>Make Order</h1>


<form>
<?php include 'supplierListBox.php';?>
    <input type="button" value="Select Supplier" id="submitSup">
    <input type="hidden" id="supplier"  name="supplier">
</form>

<div id="itemsTable"></div>


<script>
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
                type: "POST",
                url: "itemListbox.php",
                data: {
                    supplierID : supplierID
                },
                cache: false,
                success: function(data){
                    $("#itemsTable").html(data);
                    createFormFields();
                },
                error: function(xhr,status,error){
                    console.log(xhr);
                }
            });   
        })
    });

    // ajax handling form submittion
    $("mainform").submit(function(){
        
        var stockID = [];

        $

        $("input")
    })
</script>

<script>
    // using a dynamic form field creation with js because some suppliers have more items they sell than others
    function createFormFields() {
    var sel = document.getElementById("itemsTable");

    console.log(sel)

    //use the trim to only safe the data from the sel in the content variable
        var content = sel.textContent.trim();

    // Check if a valid option is selected
   
      

        // Split the value into details
        var details = content.split("|").filter(Boolean)

        console.log(details)

       $("#mainform").empty();


        var table =document.createElement("table")//create table 
        table.id = "table";

        // create table headers
        var tableHearderRow =document.createElement("tr");
        var th1 =document.createElement("th")
        th1.textContent = "Stock ID"
        var th2 = document.createElement("th")
        th2.textContent = "Description"
        var th3 =document.createElement("th")
        th3.textContent = "Quantity"
        tableHearderRow.appendChild(th1)
        tableHearderRow.appendChild(th2)
        tableHearderRow.appendChild(th3)
        table.appendChild(tableHearderRow)

        for (var i = 0 ; i < details.length; i += 2){
            var row =document.createElement("tr")

            var td1 =document.createElement("td")
            td1.textContent =details[i]

            var td2 =document.createElement("td")
            td2.textContent =details[i+1]

            var td3 =document.createElement("td")
            var input = document.createElement("input")
            input.type = "number"
            input.name =details[i+1].replace(/\s/g, '-')
            input.id =details[i]
            td3.appendChild(input)

            row.appendChild(td1)
            row.appendChild(td2)
            row.appendChild(td3)

            table.appendChild(row)

            console.log(input.name)
        }

        var divElement =document.createElement("div")
        divElement.id = "error-message"

        var submit =document.createElement("input")
        submit.type = "button"
        submit.id = "button";
        submit.value = "Submit Order"
        submit.onclick = function(){
            confirmCheck()
        }



        $('#mainform').append(table);
        $('#mainform').append(divElement);
        $('#mainform').append(submit);
        }
    



</script>

    <p id="display"></p>
    
    <form   onsubmit="return confirmCheck()" method="post" id="mainform">
</form>

</div>

</body>
</html>
