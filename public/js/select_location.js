
let selectCustomerId;


function setCustomers(){
    
    cateCustomersElement.innerHTML = '';
    
    for(let i = 0; i < customers.length; i++){
        cateCustomers.push(customers[i]);
        
    }
    
    
    // let option0 = document.createElement('option');
    // option0.text = ('顧客名を選択してください');
    // cateCustomersElement.appendChild(option0);
    
    for(let ii = 0; ii < cateCustomers.length; ii++){
        let option = document.createElement('option');
        option.value = cateCustomers[ii]['name'];
        option.text = cateCustomers[ii]['name'];
        // option.id = 'select' + cateCustomers[ii]['id'];
        
        cateCustomersElement.appendChild(option);
        
        console.log(option);
    }
    
    
    
}

setCustomers();


cateCustomersElement.addEventListener('change', function (){
    // console.log(cateCustomersElement.selectedIndex + 1);
    selectCustomerId = cateCustomersElement.selectedIndex + 1;
    
    setLocations();
})




function setLocations(){
    
    cateLocationsElement.innerHTML = '';
    
    let selectLocations = locations.filter((locations) => locations.customer_id == selectCustomerId);
    for (let i = 0; i < selectLocations.length; i++){
        let option = document.createElement('option');
        option.value = selectLocations[i]['name'];
        option.text = selectLocations[i]['name'];
        
        cateLocationsElement.appendChild(option);
        
        console.log(option);
    }
}



// console.log(cateLocations);

// let hoge = cateLocations.filter((location) => location.customer_id == 1);
// console.log(hoge);

