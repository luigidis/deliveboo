@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-8">
                <h1 class="title">Aggiungi un nuovo piatto al menù</h1>
            </div>
            <div class="btn-y">
                <a href="{{ route('admin.plates.index') }}"><button type="button" class="btn btn-warning btn-lg">Torna
                        indietro</button></a>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('admin.plates.store') }}" method="POST" id="form" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="img">Foto del piatto</label>

                <div class="custom-file">
                    <input type="file" name="img"
                        class="custom-file-input  input-control @error('img')is-invalid @enderror" id="img">
                    <div class="error"></div>

                    <label class="custom-file-label" for="img">Scegli un file</label>
                    @error('img')
                        <div id="img" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="form-group">
                <label for="name">Nome del piatto</label>

                <input type="text" class="form-control input-control @error('name')is-invalid @enderror" id="name_1"
                    value="{{ old('name') }}" name="name" autocomplete="name" autofocus aria-describedby="helpName">
                <div class="error"></div>
                @error('name')
                    <div id="name" class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control input-control @error('description')is-invalid @enderror" id="description"
                    name="description" rows="5">{{ old('description') }}</textarea>
                <div class="error"></div>
                @error('description')
                    <div id="title" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Prezzo €</label>
                <input type="text" class="form-control input-control @error('price')is-invalid @enderror" id="price"
                    value="{{ old('price') }}" name="price" aria-describedby="price">
                <div class="error"></div>
                @error('price')
                    <div id="price" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">
                <label for="is_visible">Disponibilità</label>
                <select name="is_visible" class="form-control @error('is_visible') is-invalid @enderror" id="is_visible">
                    <option value="1" default>Disponibile</option>
                    <option value="0">Non Disponibile</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-secondary" id="submitButton">Aggiungi</button>
            </div>
        </form>



    </div>
@endsection

<style>
    @media all and (max-width:576px) {
        .title {
            font-size: 1.5rem;
        }

        .btn {
            scale: 0.8;
        }
    }


    /* .input-control.success {
        border-color: green;
    }

    .input-control.error {
        border-color: red;
    } */

    .error {
        color: red;
    }
</style>


@section('script-js')
    <script>
        console.log('ciao');


        // submitButton.addEventListener('click', function() {
        //   form.preventDefault();

        //   validateForm();
        // });

        window.addEventListener('load', () => {
            const form = document.getElementById('form');

            // const namePlate = document.getElementById('name_1');
            // console.log(namePlate);
            // const description = document.getElementById('description');

            // const price = document.getElementById('price');
            // const isVisible = document.getElementById('is_visible');
            const submitButton = document.getElementById('submitButton');
            submitButton.addEventListener('click', e => {
                e.preventDefault();
                if (validateInputs())
                    form.submit();
                })
            })



                

        const setError = (element, message) => {
            const inputControl = element.parentElement;
            console.log(inputControl)
            const errorDisplay = document.querySelector('.error');
            console.log(errorDisplay)

            errorDisplay.innerText = message;
            inputControl.classList.add('error');
            inputControl.classList.remove('success');

        }

        const setSuccess = (element) => {
            console.log(element)
            const inputControl = element.parentElement;
            const errorDisplay = document.querySelector('.error');
            console.log(inputControl)
            errorDisplay.innerText = '';
            inputControl.classList.add('success');
            inputControl.classList.remove('error');

        }

        function validateInputs() {

            let validate = true;


            const nameHtml = document.getElementById('name_1')
            const description = document.getElementById('description');
            const price = document.getElementById('price');
            const isVisible = document.getElementById('is_visible');



            // console.log(nameHtml, description, price, isVisible)




            const nameValue = nameHtml.value.trim();
            const descriptionValue = description.value.trim();
            const priceValue = price.value.trim();
            // const priceFloat = parsFloat(priceValue);
            const isVisibleVlue = isVisible.value.trim();


            if (nameValue === '') {
                setError(nameHtml, 'Campo Obbligatorio');
                validate = false;
            } else {
                setSuccess(nameHtml);
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
    </script>
@endsection
