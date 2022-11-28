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
            <div class="body_content py-2 d-flex justify-content-center align-items-center">
                <div class="box_shadow_stroke pt-3 card_form px-3">
                    <form action="{{ route('admin.plates.update', $plate) }}" method="POST" enctype="multipart/form-data"
                        id="form" class="d-flex flex-column justify-content-center">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="restaurant_id" value="{{ $plate->restaurant_id }}">

                        <div class="form-group">
                            <label for="img">Foto del piatto*</label>
                            <div class="error"></div>
                            <input type="file" name="img"
                                class="form-control-file  @error('img')is-invalid @enderror box_shadow_stroke_small"
                                id="img">
                            @error('img')
                                <div id="img" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
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
                                class="@error('is_visible') is-invalid @enderror card_select bg_text_color c_prim_color box_shadow_stroke_small py-2 px-2 mb-1 w-100"
                                id="is_visible">
                                <option value="1" default>Disponibile</option>
                                <option value="0">Non Disponibile</option>
                            </select>
                        </div>
                        <div class="d-flex flex-wrap">
                            <button type="submit"
                                class="bg_link_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3">
                                Modifica piatto
                            </button>
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
