@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="form">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>


                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control input-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    <div class="error"></div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control input-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email">
                                    <div class="error"></div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>


                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control input-control @error('password') is-invalid @enderror"
                                        name="password" autocomplete="new-password">
                                    <div class="error"></div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>


                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control input-control"
                                        name="password_confirmation" autocomplete="new-password">
                                    <div class="error"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">Nome
                                    Attività</label>


                                <div class="col-md-6">
                                    <input id="restaurant_name" type="string" name="restaurant_name" value="{{ old('restaurant_name') }}"
                                        class="form-control input-control 
                                @error('restaurant_name') is-invalid @enderror">
                                    <div class="error"></div>
                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo</label>


                                <div class="col-md-6">
                                    <input id="address" type="string" name="address" value="{{ old('address') }}"
                                        class="form-control input-control @error('address') is-invalid @enderror">
                                    <div class="error"></div>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Numero di
                                    telefono</label>


                                <div class="col-md-6">
                                    <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                                        class="form-control input-control @error('phone') is-invalid @enderror">
                                    <div class="error"></div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="p_iva" class="col-md-4 col-form-label text-md-right">Partita Iva</label>


                                <div class="col-md-6">
                                    <input id="p_iva" type="string" name="p_iva" value="{{ old('p_iva') }}"
                                        class="form-control input-control @error('p_iva') is-invalid @enderror">
                                    <div class="error"></div>
                                    @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            <?php
                            use App\Category;
                            $categories = Category::orderBy('name', 'asc')->get();
                            ?>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="category">Categorie:</label>

                                <div class="col-md-6">
                                    <div class="@error('categories') is-invalid @enderror" id="categories">

                                        @foreach ($categories as $key => $category)
                                        <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="categories[]"
                                                    @if (in_array($category->id, old('categories', []))) checked @endif type="checkbox"
                                                    id="category-{{ $category->id }}" value="{{ $category->id }}">
                                                <label class="form-check-label"
                                                    for="category-{{ $category->id }}">{{ $category->name }}</label>
                                            </div>
                                        @endforeach
                                        <div id="errorCat"></div>
                                    </div>

                                    @error('categories')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Scegli
                                    immagine</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                        id="image" name="image" value="{{ old('image') }}">
                                    <div class="error"></div>
                                </div>
                                @error('image')
                                    <div id="image" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="submitBtn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-js')
    <script>
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
                if(validateInputs())
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
                if(phoneValue === '') {
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
                    if(element.checked){
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
                    if(!anyChecked) {
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
                if(!img.files.length) {
                    setError(image, 'Immagine obbligatoria');
                    validated = false;
                }else {
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
    </script>
@endsection
