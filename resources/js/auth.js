// console.log('yo');
/*****************************************************************************
 * per un corretto funzionamento dei controlli devo eseguire il tutto dopo
 * il caricamento della pagina
*****************************************************************************/
window.addEventListener('load', () => {
    /*****************************************************************************
     * recupero tutti gli elementi su cui eseguire i controlli
    *****************************************************************************/
    const form = document.getElementById('form');
    // console.log(form.submit());
    const username = document.getElementById('name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const password2 = document.getElementById('password-confirm');
    const restaurant = document.getElementById('restaurant_name');
    const address = document.getElementById('address');
    const phone = document.getElementById('phone');
    const pIva = document.getElementById('p_iva');
    const image = document.getElementById('image')
    const submitButton = document.getElementById('submitBtn');
    submitButton.addEventListener('click', e => {
        e.preventDefault();
        if (validateInputs())
            form.submit();
    })

    /*****************************************************************************
     * gestisco l'errore
    *****************************************************************************/
    const setError = (element, message) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');
        errorDisplay.innerText = message;
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
    }

    /*****************************************************************************
     * gestisco l'errore nelle categorie
    *****************************************************************************/
    const setErrorCat = (message) => {
        const inputControl = document.getElementById('errorCat');
        inputControl.innerText = message;
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
    }

    /*****************************************************************************
     * gestisco il successo
    *****************************************************************************/
    const setSuccess = (element) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');
        errorDisplay.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
    }

    /*****************************************************************************
     * gestisco il successo nelle categorie
    *****************************************************************************/
    const setSuccessCat = () => {
        const inputControl = document.getElementById('errorCat');
        inputControl.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
    }

    /*****************************************************************************
     * inizio validazione
    *****************************************************************************/
    function validateInputs() {
        /*****************************************************************************
         * recupero i valori di cui ho bisogno
        *****************************************************************************/
        const usernameValue = username.value.trim();
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        const password2Value = password2.value.trim();
        const restaurantValue = restaurant.value.trim();
        const addressValue = address.value.trim();
        const phoneValue = phone.value.trim();
        const phoneInt = parseInt(phoneValue);
        const pIvaValue = pIva.value.trim();
        const pIvaInt = parseInt(pIvaValue);
        const categories = document.querySelectorAll('[type="checkbox"]');
        // console.dir(categories[2].checked);
        const categoriesValues = [];
        categories.forEach(element => {
            categoriesValues.push(element.value);
        });
        const img = document.getElementById('image');
        let validated = true;


        /*****************************************************************************
         * controllo username
        *****************************************************************************/
        if (usernameValue === '') {
            setError(username, 'Campo obbligatorio');
            validated = false;
        } else {
            setSuccess(username);
        }

        /*****************************************************************************
         * controllo email
        *****************************************************************************/
        if (emailValue === '') {
            setError(email, 'Campo obbligatorio');
            validated = false;
        } else if (!ValidateEmail(emailValue)) {
            setError(email, 'Indirizzo email non valido')
            validated = false;
        } else {
            setSuccess(email);
        }

        /*****************************************************************************
         * controllo password
        *****************************************************************************/
        if (passwordValue === '') {
            setError(password, 'Campo obbligatorio');
            validated = false;
        } else if (passwordValue.length < 8) {
            setError(password, 'La Password deve contenere almeno 8 caratteri');
            validated = false;
        } else {
            setSuccess(password);
        }

        if (password2Value === '') {
            setError(password2, 'Conferma la tua password');
            validated = false;
        } else if (password2Value !== passwordValue) {
            setError(password2, 'La Password non coincide');
            validated = false;
        } else {
            setSuccess(password2);
        }

        /*****************************************************************************
         * controllo nome ristorante
        *****************************************************************************/
        if (restaurantValue === '') {
            setError(restaurant, 'Campo obbligatorio');
            validated = false;
        } else if (restaurantValue.length < 2) {
            setError(restaurant, 'Il nome deve contenere almeno 2 caratteri');
            validated = false;
        } else if (restaurantValue.length > 255) {
            setError(restaurant, 'Il nome non può contenere più di 255 caratteri');
            validated = false;
        } else {
            setSuccess(restaurant);
        }

        /*****************************************************************************
         * controllo indirizzo
        *****************************************************************************/
        if (addressValue === '') {
            setError(address, 'Campo obbligatorio');
            validated = false;
        } else if (addressValue.length < 4) {
            setError(address, 'Deve contenere almeno 4 caratteri');
            validated = false;
        } else if (addressValue.length > 255) {
            setError(address, 'Non può contenere più di 255 caratteri');
            validated = false;
        } else {
            setSuccess(address);
        }

        /*****************************************************************************
         * controllo numero di telefono
        *****************************************************************************/
        if (phoneValue === '') {
            setError(phone, 'Campo obbligatorio');
            validated = false;
        } else if (isNaN(phoneInt)) {
            setError(phone, 'Sono ammessi sono caretteri numerici');
            validated = false;
        } else {
            setSuccess(phone);
        }

        /*****************************************************************************
         * controllo partita iva
        *****************************************************************************/
        if (pIvaValue === '') {
            setError(pIva, 'Campo obbligatorio');
            validated = false;
        } else if (isNaN(pIvaInt)) {
            setError(pIva, 'Sono ammessi sono caretteri numerici');
            validated = false;
        } else {
            setSuccess(pIva);
        }

        /*****************************************************************************
         * controllo categorie
        *****************************************************************************/
        let anyChecked = false;
        const categoriesChecked = [];
        categories.forEach(element => {
            if (element.checked) {
                anyChecked = true;
                categoriesChecked.push(element.value);
            }
        });
        if (!anyChecked) {
            setErrorCat('Seleziona almeno una categoria');
            validated = false;
        } else {
            categoriesChecked.forEach(element => {
                console.log(categoriesValues);
                console.log(parseInt(element));
                categoriesValues.includes(element) ? '' : anyChecked = false;
            });
            if (!anyChecked) {
                setErrorCat('Categoria inesistente');
                validated = false;
            } else {
                setSuccessCat();
            }
        }

        /*****************************************************************************
         * controllo immagine
        *****************************************************************************/
        const re = /(\.jpg|\.jpeg|\.bmp|\.webp|\.png)$/i;
        if (!img.files.length) {
            setError(image, 'Immagine obbligatoria');
            validated = false;
        } else {
            const imgName = img.files[0].name;
            if (!re.exec(imgName)) {
                setError(image, 'File non supportato');
                validated = false;
            } else {
                setSuccess(image);
            }
        }
        return validated;
    }
})

/*****************************************************************************
 * funzione di supporto alla validazione della email
*****************************************************************************/
function ValidateEmail(email) {
    const pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return email.match(pattern);
}