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

