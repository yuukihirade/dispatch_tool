

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
        option.value = cateCustomers[ii]['id'];
        option.text = cateCustomers[ii]['name'];
        cateCustomersElement.appendChild(option);
    }
    
    
    
}

console.log(cateLocations);
function setLocations(idx){
    
    cateLocationsElement.innerHTML = '';
    
    for (let i = 0; i < cateLocations.length; i++){
        let option = document.createElement('option');
        option.value = cateLocations[idx][i]['id'];
        option.text =cateLocations[idx][i]['name'];
        cateLocationsElement.appendChild(option);
    }
}

setCustomers();

cateCustomersElement.addEventListener('change', function() {
    let idx = cateCustomers.selectedIndex;
    
    setLocations(idx);
})
// console.log(idx);