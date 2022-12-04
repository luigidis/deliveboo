// controllo prezzo incompleto
// se inserisco un prezzo gli errori si buggano

window.addEventListener('load', () => {
    // Input del file >> Aggiorna il nome del label, in sostituzione all'input, con il nome del file
    const photoInputEl = document.getElementById('img')
    const photoLabelEl = document.getElementById('fileLabel')
    photoLabelEl.innerHTML = 'Foto del piatto*'

    photoInputEl.addEventListener('change', (el) => {
        const fileName = el.target.files[0].name
        photoLabelEl.innerHTML = `File selezionato: ${fileName}`
    })

    const form = document.getElementById('form');

    const inputEl = document.querySelectorAll('.input_color')

    const namePlate = document.getElementById('name_plate')
    const description = document.getElementById('description');
    const price = document.getElementById('price');
    const isVisible = document.getElementById('is_visible');
    const submitButton = document.getElementById('submitBtn');
    const submitButtonModal = document.getElementById('submitBtnModal');
    submitButton.addEventListener('click', e => {
        e.preventDefault();
        if (validateInputs()) {
            submitButton.setAttribute('data-toggle', 'modal')
        } else {
            submitButton.setAttribute('data-toggle', '')
            inputEl.forEach((el) => {
                el.addEventListener('focus', () => {
                    el.innerHTML = ''
                    el.setAttribute('value', '');
                    el.classList.remove('error');
                })
            })
        }
    })
    submitButtonModal.addEventListener('click', e => {
        e.preventDefault();
        form.submit()
    })



    const setError = (element, message) => {
        const inputControl = element.parentElement;
        const errorDisplay = document.querySelectorAll('.error_js');
        errorDisplay.forEach((el) => {
            el.innerHTML = message;
            el.setAttribute('value', message);
            el.classList.add('error');
            el.classList.remove('success');
        })
        inputControl.classList.add('error');
        inputControl.classList.remove('success');

    }

    const setSuccess = (element) => {
        const inputControl = element.parentElement;
        const errorDisplay = document.querySelectorAll('.error_js');
        errorDisplay.forEach((el) => {
            el.innerHTML = '';
            el.setAttribute('value', '');
            el.classList.add('success');
            el.classList.remove('error');
        })
        inputControl.classList.add('success');
        inputControl.classList.remove('error');

    }

    function validateInputs() {

        const nameValue = namePlate.value.trim();
        const descriptionValue = description.value.trim();
        const priceValue = price.value.trim();
        const isVisibleVlue = isVisible.value.trim();

        let validate = true;

        if (photoLabelEl.innerHTML === 'Foto del piatto*') {
            setError(photoLabelEl, 'Campo Obbligatorio');
            validate = false;
        } else {
            setSuccess(photoLabelEl);
        }

        if (nameValue === '') {
            setError(namePlate, 'Campo Obbligatorio');
            validate = false;
        } else {
            setSuccess(namePlate);
        }

        if (descriptionValue === '') {
            setError(description, 'Campo Obbligatorio');
            validate = false;
        } else {
            setSuccess(description);
        }

        if (priceValue === '') {
            setError(price, 'Campo Obbligatorio');
            validate = false;
        } else {
            setSuccess(price);
        }

        return validate;
    }
})