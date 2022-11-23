console.log('yo');

const form = document.getElementById('form');
const username = document.getElementById('name');
const email= document.getElementById('email');
const password= document.getElementById('password');
const password2= document.getElementById('passworld-confirm');
const restaurant= document.getElementById('restaurant_name');
const address= document.getElementById('address');
const phone= document.getElementById('phone');
const pIva= document.getElementById('p_iva')

form.addEventListener('sumbit', e => {
    e.preventDefault();

    validateInputs();
});


const setError = (element, message) => {
    const inputControl = element.parentElement;
    console.log(inputControl);
    const errorDisplay = inputControl.querySelector('.error');
    console.log(errorDisplay);
    
    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
    
}

const setSuccess = (element) => {
    const inputControl = element.parentElement;
    // console.log(inputControl);
    const errorDisplay = inputControl.querySelector('.error');
    // console.log(successDisplay);
    
    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
    
}

function validateInputs() {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const restaurantValue = restaurant.value.trim();
    const addressValue = address.value.trim();
    const phoneValue = phone.value.trim();
    const pIvaValue = pIva.value.trim();

    if(usernameValue === '') {
        setError(username, 'Username is required');
    } else {
        setSuccess(username);
    }

    if(emailValue === '') {
        setError(email, 'email is required');
    } else {
        setSuccess(email);
    }

    if(passwordValue === '') {
        setError(password, 'password is required');
    } else {
        setSuccess(password);
    }

    if(password2Value === '') {
        setError(password2, 'password2 is required');
    } else {
        setSuccess(password2);
    }

    if(restaurantValue === '') {
        setError(restaurant, 'restaurant is required');
    } else {
        setSuccess(restaurant);
    }

    if(addressValue === '') {
        setError(address, 'address is required');
    } else {
        setSuccess(address);
    }

    if(phoneValue === '') {
        setError(phone, 'phone is required');
    } else {
        setSuccess(phone);
    }

    if(pIvaValue === '') {
        setError(pIva, 'pIva is required');
    } else {
        setSuccess(pIva);
    }
}

export default validationReg