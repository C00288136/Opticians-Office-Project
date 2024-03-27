function populate(){
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;
console.log("script running")
    var StockDetails = result.split(',');
    document.getElementById("display").innerHTML = "The details of the selected Stock item are: " + result;
    document.getElementById("StockNumber").value = StockDetails[0];
    document.getElementById("Description").value = StockDetails[1];
    document.getElementById("Quantity").value = StockDetails[2];
    document.getElementById("ReorderQty").value = StockDetails[3];
    document.getElementById("SupplierStockCode").value = StockDetails[4];
    document.getElementById("SupplierID").value = StockDetails[5];
}

