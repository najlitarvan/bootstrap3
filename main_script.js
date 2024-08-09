'use strict';
document.addEventListener('DOMContentLoaded', () => {
const form = document.getElementById('flight_booking');
const output = document.getElementById('price_output'); 

form.addEventListener('submit', function(event) {
    //inputting data
    const destination_prices = {
        Praha: 500,  
        Frankfurt: 3000,
        New_York: 15000,  
        Sydney: 30000   
    };
    
    const classPrices = {
        economy: 1,  
        business: 1.25, 
        royal: 1.5     
    };
    
    // Assuming `event` is defined, if not, remove `event.preventDefault();`
    event.preventDefault();
    console.log('i live');
    
    // Get values from form elements
    const destination = destination_prices[document.getElementById('destinations').value];
    const flightTickets = parseInt(document.getElementById('flight_tickets').value, 10);
    const selectedClass = classPrices[document.querySelector('input[name="class"]:checked').value];
    const spendingMoney = parseInt(document.getElementById('spending_money').value.trim(), 10);
    const returnFlight = document.getElementById('return_flight').checked;
    
    // Calculate the output number
    const outputNumber = destination * flightTickets * selectedClass * (returnFlight ? 2 : 1);
    
    console.log(outputNumber);

    const price_output =document.getElementById('price_output');
    const price_output_status =document.getElementById('price_output_status');
    price_output.textContent= String(outputNumber.toLocaleString().replace(/,/g, ' ') +' Kč');
    console.log(spendingMoney);
    if (parseInt(outputNumber)<parseInt(spendingMoney)) {
        price_output.style.backgroundColor='#03ce3d';
        price_output_status.backgroundColor='#03ce3d';
        price_output_status.textContent= 'letenku si můžete objednat';
        price_output_status.style.color= '#028326';
    }
    else{
        price_output.style.backgroundColor='#ff6161';
        price_output_status.backgroundColor='#ff6161';
        price_output_status.textContent= 'letenku si nemůžete objednat';
        price_output_status.style.color= '#ff1a1a';
    }




});


const textarea = document.getElementById('message');
    
    textarea.addEventListener('input', function(event) {
        // Updated regular expression to exclude the question mark
        const validCharacters = /^[a-zA-Z0-9\s.,!]*$/;
        
        if (!validCharacters.test(textarea.value)) {
            // Replace any invalid characters
            textarea.value = textarea.value.replace(/[^a-zA-Z0-9\s.,!]/g, '');
            
        }
    });
});