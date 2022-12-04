@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-center">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        Modifica piatto
                    </h1>
                </div>
            </div>
            <div class="body_content form_container">
                <div class="box_shadow_stroke card_form">
                    <form action="{{ route('admin.plates.update', $plate) }}" method="POST" enctype="multipart/form-data"
                        id="form" class="d-flex flex-column justify-content-center">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="restaurant_id" value="{{ $plate->restaurant_id }}">

                        <div class="form-group mb-0">
                            <label for="img" id="fileLabel"
                                class="box_shadow_stroke_small w-100 px-1 py-2 bg-white @error('img')shadow_stroke_error @enderror input_color">
                                Foto del piatto*
                            </label>
                            <input type="file" name="img" value="{{old('img')}}"
                                class="form-control-file invisible @error('img') shadow_stroke_error @enderror input_color" id="img">
                            @error('img')
                                <div id="img" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-0">
                            <label for="name">Nome del piatto*</label>
                            <input type="text"
                                class="form-control error_js @error('name')shadow_stroke_error @enderror input_color box_shadow_stroke_small"
                                id="name_plate" value="{{ old('name', $plate->name) }}" name="name"
                                aria-describedby="helpName">
                            @error('name')
                                <div id="name_plate" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="description" class="d-block">Descrizione*</label>
                            <textarea class="error_js @error('description')shadow_stroke_error @enderror input_color box_shadow_stroke_small w-100" id="description"
                                name="description" rows="5">{{ old('description', $plate->description) }}</textarea>
                            @error('description')
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Prezzo €*</label>
                            <input type="text"
                                class="form-control error_js @error('price')shadow_stroke_error @enderror input_color box_shadow_stroke_small"
                                id="price" value="{{ old('price', $plate->price) }}" name="price"
                                aria-describedby="price">
                            @error('price')
                                <div id="price" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="is_visible" class="d-block">Disponibilità*</label>
                            {{-- <input type="number" name="is_visible" class="form-control @error('is_visible') shadow_stroke_error @enderror input_color" id="is_visible" placeholder="Enter the availability" min="0" max="1" value="{{ $plate->is_visible }}" required> --}}
                            <select name="is_visible"
                                class="@error('is_visible') shadow_stroke_error @enderror input_color card_select bg-white font-weight-bold c_prim_color box_shadow_stroke_small py-2 px-2 mb-1 w-100"
                                id="is_visible">
                                <option value="1" default>Disponibile</option>
                                <option value="0">Non Disponibile</option>
                            </select>
                        </div>
                        <div class="d-flex flex-wrap">
                            <button type="button" id="submitBtn"
                                class="bg_link_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3"
                                data-toggle="modal" data-target="#exampleModal">
                                Modifica piatto
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog box_shadow_stroke_small rounded-0" role="document">
                                    <div class="modal-content rounded-0">
                                        <div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="px-3 py-2 d-block">&times;</span>
                                            </button>
                                            <h5 class="modal-title px-3 py-2" id="exampleModalLabel"> {{ $plate->name }} </h5>
                                        </div>
                                        <div class="modal-body font-weight-bold stroke_bottom">
                                            Vuoi modificare il piatto?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="submitBtnModal"
                                                class="bg_link_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3">
                                                Salva le modifiche
                                            </button>
                                            <button type="button"
                                                class="bg_seco_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3 ml-auto text-center font-weight-bold"
                                                data-dismiss="modal">
                                                Annulla
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('admin.plates.show', $plate) }}"
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
</style>
@section('script-js')
    <script>
        window.addEventListener('load', () => {
            // Input del file >> Aggiorna il nome del label, in sostituzione all'input, con il nome del file
            const photoInputEl = document.getElementById('img')
            const photoLabelEl = document.getElementById('fileLabel')
            photoLabelEl.innerHTML = 'Foto del piatto*'

            photoInputEl.addEventListener('change', (el) => {
                const fileName = el.target.files[0].name
                photoLabelEl.innerHTML = `Nome del file: ${fileName}`
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
                    // el.innerHTML = '';
                    // el.setAttribute('value', '');
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

                //TODO: LA FOTO NELL'EDIT NON E' OBBLIGATORIA!!!

                // if (photoLabelEl.innerHTML === 'Foto del piatto*') {
                //     setError(photoLabelEl, 'Campo Obbligatorio');
                //     validate = false;
                // } else {
                //     setSuccess(photoLabelEl);
                // }

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
    </script>
@endsection
