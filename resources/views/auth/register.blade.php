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
                                        class="form-control input-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>
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
                                        class="form-control input-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">
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
                                        class="form-control input-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">
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
                                    <input id="restaurant_name" type="string" name="restaurant_name"
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
                                    <input id="address" type="string" name="address"
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
                                    <input id="phone" type="tel" name="phone"
                                        class="form-control input-control @error('phone') is-invalid @enderror">
                                        <div class="error">Errore script</div>
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
                                    <input id="p_iva" type="string" name="p_iva"
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
                                    <div class="@error('categories') is-invalid @enderror">

                                        @foreach ($categories as $key => $category)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="categories[]"
                                                    @if (in_array($category->id, old('categories', []))) checked @endif type="checkbox"
                                                    id="category-{{ $category->id }}" value="{{ $category->id }}">
                                                <label class="form-check-label"
                                                    for="category-{{ $category->id }}">{{ $category->name }}</label>
                                            </div>
                                        @endforeach
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
                                        id="image" name="image">
                                </div>
                                @error('image')
                                    <div id="image" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="submit">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            {{-- <div class="col-md-6 offset-md-4">
                                <input type="button" class="btn btn-primary" id="diocane" value="prova">
                            </div> --}}


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-js')
    <script>
        console.log('yo');

        const form = document.getElementById('form');
        const username = document.getElementById('name');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const password2 = document.getElementById('password-confirm');
        const restaurant = document.getElementById('restaurant_name');
        const address = document.getElementById('address');
        const phone = document.getElementById('phone');
        const pIva = document.getElementById('p_iva')

        // form.addEventListener('sumbit', e => {
        //     e.preventDefault();
        //     console.log('sumbit');
        //     validateInputs();
        // });

        // console.log(provaButton);

        // submitButton.addEventListener('mouseover', function() {
        //     // form.preventDefault();
        //     console.log('cliccato')
        // })

        window.addEventListener('load', () => {
            const submitButton = document.getElementById('submit');
            submitButton.addEventListener('click', e => {
                e.preventDefault();

                console.log('bloccato submit')
                validateInputs();
                //form.submit();
            })
        })





        const setError = (element, message) => {
            console.log('entrato su setError');
            // console.log(message);
            const inputControl = element.parentElement;
            // console.log(inputControl);
            const errorDisplay = inputControl.querySelector('.error');
            console.log(errorDisplay);

            errorDisplay.innerText = message;
            console.log(inputControl)
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

            if (usernameValue === '') {
                setError(username, 'Campo obbligatorio');
            } else {
                setSuccess(username);
            }

            if (emailValue === '') {
                setError(email, 'Campo obbligatorio');
            } else {
                setSuccess(email);
            }

            if (passwordValue === '') {
                setError(password, 'Campo obbligatorio');
            } else {
                setSuccess(password);
            }

            if (password2Value === '') {
                setError(password2, 'Campo obbligatorio');
            } else {
                setSuccess(password2);
            }

            if (restaurantValue === '') {
                setError(restaurant, 'Campo obbligatorio');
            } else {
                setSuccess(restaurant);
            }

            if (addressValue === '') {
                setError(address, 'Campo obbligatorio');
            } else {
                setSuccess(address);
            }

            if (phoneValue === '') {
                setError(phone, 'Campo obbligatorio');
            } else {
                setSuccess(phone);
            }

            if (pIvaValue === '') {
                setError(pIva, 'Campo obbligatorio');
            } else {
                setSuccess(pIva);
            }
        }
    </script>
@endsection
