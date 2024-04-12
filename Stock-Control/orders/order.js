function confirmCheck(){

    var inputs  = document.querySelectorAll('input[type="number"]')

    var valuesArray = []

    inputs.forEach(function(input){
        var value = input.value;

        if (value === ""){
            valuesArray.push(0)
        }
        else
        valuesArray.push(parseInt(value))
    })

    console.log(valuesArray)

    
}

function populate(){

        // these 3 lines select the listbox and read the data from it
        var sel = document.getElementById("listbox");
        var result;
        result = sel.options[sel.selectedIndex].value;
    
        // i edited the separator for the data fields because my addresses had the , field
        var details = result.split(',');
        document.getElementById("display").innerHTML = "The details of the selected person are :" + result;
        document.getElementById("StockNumber").value = details[0];
        document.getElementById("Description").value = details[1];
        document.getElementById("Quantity").value = details[2];
        document.getElementById("ReorderQty").value = details[3];
        document.getElementById("SupplierStockCode").value = details[4];
        document.getElementById("SupplierID").value =details[5];
        }


