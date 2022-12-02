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
                            <label for="img"
                                class="box_shadow_stroke_small w-100 px-1 py-2 bg-white @error('img')is-invalid @enderror">
                                Foto del piatto*
                            </label>
                            <div class="error"></div>
                            <input type="file" name="img"
                                class="form-control-file d-none @error('img') is-invalid @enderror" id="img">
                            @error('img')
                                <div id="img" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-0">
                            <div class="error"></div>
                            <label for="name">Nome del piatto*</label>
                            <input type="text"
                                class="form-control @error('name')is-invalid @enderror box_shadow_stroke_small"
                                id="name" value="{{ old('name', $plate->name) }}" name="name"
                                aria-describedby="helpName">
                            {{-- <small id="helpNitle" class="form-text text-muted">Name</small> --}}
                            @error('name')
                                <div id="name" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <div class="error"></div>
                            <label for="description" class="d-block">Descrizione*</label>
                            <textarea class="@error('description')is-invalid @enderror box_shadow_stroke_small w-100" id="description"
                                name="description" rows="5">{{ old('description', $plate->description) }}</textarea>
                            {{-- <small id="helpDescription" class="form-text text-muted">Description</small> --}}
                            @error('description')
                                <div id="title" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="error"></div>
                            <label for="price">Prezzo €*</label>
                            <input type="text"
                                class="form-control @error('price')is-invalid @enderror box_shadow_stroke_small"
                                id="price" value="{{ old('price', $plate->price) }}" name="price"
                                aria-describedby="price">
                            @error('price')
                                <div id="price" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <div class="error"></div>
                            <label for="is_visible" class="d-block">Disponibilità*</label>
                            {{-- <input type="number" name="is_visible" class="form-control @error('is_visible') is-invalid @enderror" id="is_visible" placeholder="Enter the availability" min="0" max="1" value="{{ $plate->is_visible }}" required> --}}
                            <select name="is_visible"
                                class="@error('is_visible') is-invalid @enderror card_select bg-white font-weight-bold c_prim_color box_shadow_stroke_small py-2 px-2 mb-1 w-100"
                                id="is_visible">
                                <option value="1" default>Disponibile</option>
                                <option value="0">Non Disponibile</option>
                            </select>
                        </div>
                        <div class="d-flex flex-wrap">
                            <button type="button"
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
                                            <button type="submit"
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
