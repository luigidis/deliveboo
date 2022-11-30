@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-center">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        Modifica il tuo ristorante
                    </h1>
                </div>
            </div>

            <div class="body_content form_container">
                <div class="box_shadow_stroke card_form">
                    <form action="{{ route('admin.restaurant.update', $restaurant) }}" method="POST"
                        enctype="multipart/form-data" class="d-flex flex-column justify-content-center">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nome ristorante*</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror box_shadow_stroke_small"
                                id="name" name="name" value="{{ old('name', $restaurant->name) }}"
                                aria-describedby="helpname">
                            {{-- <small id="helpname" class="form-text text-muted">Modifica nome del tuo ristorante</small> --}}
                            @error('name')
                                <div id="name" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="d-block" for="category">Categorie:*</label>
                            <div class="@error('categories') is-invalid @enderror">

                                @foreach ($categories as $key => $category)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="categories[]"
                                            @if (in_array($category->id, old('categories', $restaurant->categories->pluck('id')->all()))) checked @endif type="checkbox"
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

                        <div class="form-group">
                            <label for="address">Indirizzo*</label>
                            <input type="text"
                                class="form-control @error('address') is-invalid @enderror box_shadow_stroke_small"
                                id="address" name="address" value="{{ old('address', $restaurant->address) }}"
                                aria-describedby="helpname">
                            {{-- <small id="helpname" class="form-text text-muted">Modifica indirizzo del tuo ristorante</small> --}}
                            @error('address')
                                <div id="address" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Numero di telefono*</label>
                            <input type="text"
                                class="form-control @error('phone') is-invalid @enderror box_shadow_stroke_small"
                                id="phone" name="phone" value="{{ old('phone', $restaurant->phone) }}"
                                aria-describedby="helpname">
                            {{-- <small id="helpname" class="form-text text-muted">Modifica il contatto telefonico</small> --}}
                            @error('phone')
                                <div id="phone" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="p_iva">Partita IVA*</label>
                            <input type="text"
                                class="form-control @error('p_iva') is-invalid @enderror box_shadow_stroke_small"
                                id="p_iva" name="p_iva" value="{{ old('p_iva', $restaurant->p_iva) }}"
                                aria-describedby="helpname">
                            {{-- <small id="helpname" class="form-text text-muted">Modifica la Partita IVA del tuo 
                                ristorante</small> --}}
                            @error('p_iva')
                                <div id="p_iva" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image" class="font-weight-bold">Scegli foto*</label>
                            <input type="file"
                                class="form-control-file @error('image') is-invalid @enderror box_shadow_stroke_small"
                                id="image" name="image">
                            @error('image')
                                <div id="image" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex">
                            <button type="submit"
                                class="bg_link_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3">
                                Modifica ristorante
                            </button>
                            <a href="{{ route('admin.home') }}"
                                class="bg_seco_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3 ml-auto text-center font-weight-bold">
                                Annulla modifiche
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
