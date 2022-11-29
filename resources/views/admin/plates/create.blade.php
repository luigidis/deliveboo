@extends('layouts.app')

@section('content')
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id']; // è lo user id del proprietario del ristorante
    }
    ?>
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-center">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        Aggiungi un nuovo piatto
                    </h1>
                </div>
            </div>
            <div class="body_content py-2 d-flex justify-content-center align-items-center">
                <div class="box_shadow_stroke pt-3 card_form px-3">
                    <form action="{{ route('admin.plates.store', ['id' => $id]) }}" method="POST" enctype="multipart/form-data"
                        id="form" class="d-flex flex-column justify-content-center">
                        @csrf

                        <div class="form-group">
                            <label for="img" class="d-block">Foto del piatto</label>
                            <input type="file" name="img" class="form-file-input @error('img')is-invalid @enderror box_shadow_stroke_small"
                                id="img">
                            <div class="error"></div>
                            @error('img')
                                <div id="img" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="name">Nome del piatto</label>

                            <input type="text" class="form-control input-control @error('name')is-invalid @enderror box_shadow_stroke_small"
                                id="name_1" value="{{ old('name') }}" name="name" autocomplete="name" autofocus
                                aria-describedby="helpName">
                            <div class="error"></div>
                            @error('name')
                                <div id="name" class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="description" class="d-block">Descrizione</label>
                            <textarea class="@error('description')is-invalid @enderror box_shadow_stroke_small w-100" id="description"
                                name="description" rows="5">{{ old('description') }}</textarea>
                            <div class="error"></div>
                            @error('description')
                                <div id="title" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Prezzo</label>
                            <input type="text" class="form-control input-control @error('price')is-invalid @enderror box_shadow_stroke_small"
                                id="price" value="{{ old('price') }}" name="price" aria-describedby="price">
                            <div class="error"></div>
                            @error('price')
                                <div id="price" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="is_visible">Disponibilità</label>
                            <select name="is_visible" class="form-control @error('is_visible') is-invalid @enderror box_shadow_stroke_small"
                                id="is_visible">
                                <option value="1" default>Disponibile</option>
                                <option value="0">Non Disponibile</option>
                            </select>
                        </div>
                        <div class="d-flex flex-wrap">
                            <button type="button"
                                class="bg_link_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3"
                                data-toggle="modal" data-target="#exampleModal">
                                Aggiungi piatto
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> . . . </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Vuoi aggiungere questo piatto al tuo ristorante?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annulla</button>
                                            <button type="submit" class="btn btn-secondary">Aggiungi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('admin.plates.index') }}"
                                class="bg_seco_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3 ml-auto text-center font-weight-bold">
                                Annulla
                            </a>
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
