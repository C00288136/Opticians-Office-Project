/* Name: Michal Kuras
Student Number : C00288136
Purpose: JS scripts for the orders form
Date: 12/04/24
*/
function populate(){
   
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;

    var personalDetails = result.split(',');
    document.getElementById("display").innerHTML = "The details of the selected person are :" + result;
    document.getElementById("StockNumber").value = personalDetails[0];
    document.getElementById("Description").value = personalDetails[1];
    document.getElementById("Quantity").value = personalDetails[2];
    document.getElementById("ReorderQty").value = personalDetails[3];
    document.getElementById("SupplierID").value = personalDetails[4];
    
    }
function createFormFields() {
    // function i created to dynamically create a table depending on the amount of entires needed which are 
    // received from the itemListbox
    var sel = document.getElementById("itemsTable");
    // trim used to only get the text content of the element
    var content = sel.textContent.trim();
    // split by a character and filter used to get rid of any null,nan values
    var details = content.split("|").filter(Boolean);

    // jquery function to clear the content of the form in case the user decides to choose to make a order from a different supplier
    $("#mainform").empty();

    // create table
    var table = document.createElement("table");
    table.id = "table";

    // create headers
    var tableHeaderRow = document.createElement("tr");
    var th1 = document.createElement("th");
    th1.textContent = "Stock ID";
    var th2 = document.createElement("th");
    th2.textContent = "Description";
    var th3 = document.createElement("th");
    th3.textContent = "Quantity";
    // appending all the table headers to their parent element bring the table Header
    tableHeaderRow.appendChild(th1);
    tableHeaderRow.appendChild(th2);
    tableHeaderRow.appendChild(th3);
    // append header to table
    table.appendChild(tableHeaderRow);

    // for loop for creating the data of the table
    // the details are 3 pieces of info hence why index skipping by 2
    for (var i = 0; i < details.length; i += 2) {
        var row = document.createElement("tr");

        // settings up names value etc for the input fields
        var td1 = document.createElement("td");
        var Stockid = document.createElement("input");
        Stockid.type = "text";
        Stockid.name = details[i]
        Stockid.value = details[i];
        Stockid.disabled = true;
        td1.appendChild(Stockid);

        var td2 = document.createElement("td");
        var Desc = document.createElement("input");
        Desc.type = "text";
        Desc.name = details[i+1]
        Desc.value = details[i + 1];
        Desc.disabled = true; // Disable the input field
        td2.appendChild(Desc);

        var td3 = document.createElement("td");
        var Quantity = document.createElement("input");
        Quantity.type = "number";
        Quantity.name = details[i] + "_quantity"; // Concatenate stock ID with "_quantity"
        Quantity.id = details[i];
        Quantity.min = 0;
        Quantity.max = 200;
        td3.appendChild(Quantity);


        // made a hidden input variable for the supplierID so it can be passed in the post
        var supplierid = document.getElementById("supplier").value
        var hiddenSupplierID = document.createElement("input");
        hiddenSupplierID.type = "hidden";
        hiddenSupplierID.name = "Supplier"
        hiddenSupplierID.value = supplierid;
        td1.appendChild(hiddenSupplierID)


        // all the table data is appended into the row parent element
        row.appendChild(td1);
        row.appendChild(td2);
        row.appendChild(td3);
        // row added to table
        table.appendChild(row);
    }

    // div made for any error messages
    var divElement = document.createElement("div");
    divElement.id = "error-message";

    // submit button created for the form
    var submit = document.createElement("input");
    submit.type = "submit";
    submit.id = "button";
    submit.value = "Submit Order";
    submit.onclick = function(){
        confirmCheck();
    };

    // using the $ which is a jquery function to append the table div and submit to the form
    // works the same as if i made a mainform var from the element
    $('#mainform').append(table);
    // $('#mainform').append(divElement);
    $('#mainform').append(submit);
}


  


