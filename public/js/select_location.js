

function setCustomers(){
    
    cateCustomersElement.innerHTML = '';
    
    for(let i = 0; i < customers.length; i++){
        
        let option = document.createElement('option');
        option.value = customers[i]['id'];
        option.text = customers[i]['name'];
        
        cateCustomersElement.appendChild(option)
        
        console.log(option);
        
    }
    
}

function setLocations(selectedCustomer){
    
    cateLocationsElement.innerHTML = '';
    
    let selectLocations = locations.filter((locations) => locations.customer_id == selectedCustomer);
    for (let i = 0; i < selectLocations.length; i++){
        let option = document.createElement('option');
        option.value = selectLocations[i]['id'];
        option.text = selectLocations[i]['name'];
        
        cateLocationsElement.appendChild(option);
        
        // console.log(option);
    }
}

setCustomers();

cateCustomersElement.addEventListener('change', function (){
    var selectedCustomer = cateCustomersElement.value;
    // console.log(selectedCustomer);
    setLocations(selectedCustomer);
})