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
                            <input type="file" name="img" value="{{ old('img') }}" class="form-file-input @error('img')is-invalid @enderror box_shadow_stroke_small"
                                id="img">
                            <div class="error"></div>
                            @error('img')
                                <div id="img" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="name_plate">Nome del piatto</label>

                            <input type="text" class="form-control input-control @error('name_plate')is-invalid @enderror box_shadow_stroke_small"
                                id="name_plate" value="{{ old('name') }}" name="name_plate">    
                            <div class="error"></div>
                            @error('name_plate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="d-block">Descrizione</label>
                            <textarea class="@error('description')is-invalid @enderror box_shadow_stroke_small w-100" id="description"
                                name="description" rows="5">{{ old('description') }}</textarea>
                            <div class="error"></div>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Prezzo</label>
                            <input type="string" class="form-control input-control @error('price')is-invalid @enderror box_shadow_stroke_small"
                                id="price" value="{{ old('price') }}" name="price">
                            <div class="error"></div>
                            @error('price')
                                <div class="invalid-feedback" role="alert">
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
                            <button type="button" id="submitBtn" 
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
            </div>
        </div>  
    </section>          
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

        .input-control.success {
        border-color: green;
        }

        .input-control.error {
            border-color: red;
        }
        .error {
            color: red;
        }
    </style>


{{-- @section('script-js')
    <script>
        console.log('ciao');

        window.addEventListener('load', () => {

            const form = document.getElementById('form');

            const namePlate = document.getElementById('name_plate')
            const description = document.getElementById('description');
            const price = document.getElementById('price');
            const isVisible = document.getElementById('is_visible');
            const submitButton = document.getElementById('submitBtn');
            submitButton.addEventListener('click', e => {
                e.preventDefault();
                if (validateInputs())
                    form.submit();
            })
        })





        const setError = (element, message) => {
            const inputControl = element.parentElement;
            const errorDisplay = document.querySelector('.error');
            errorDisplay.innerText = message;
            inputControl.classList.add('error');
            inputControl.classList.remove('success');

        }

        const setSuccess = (element) => {          
            const inputControl = element.parentElement;
            const errorDisplay = document.querySelector('.error');
            errorDisplay.innerText = '';
            inputControl.classList.add('success');
            inputControl.classList.remove('error');

        }

        function validateInputs() {

            const nameValue = namePlate.value.trim();
            const descriptionValue = description.value.trim();
            const priceValue = price.value.trim();
            const isVisibleVlue = isVisible.value.trim();

            let validate = true;


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
    </script>
@endsection --}}
