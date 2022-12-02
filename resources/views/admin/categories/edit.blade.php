@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-center">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        Modifica Categoria
                    </h1>
                </div>
            </div>
            <div class="body_content py-2 form_container">
                <div class="box_shadow_stroke card_form">
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST"
                        class="d-flex flex-column justify-content-center">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nome Categoria*</label>
                            <input type="text"
                                class="form-control @error('name')is-invalid @enderror box_shadow_stroke_small"
                                id="name" value="{{ old('name', $category->name) }}" name="name"
                                aria-describedby="helpName">
                            @error('name')
                                <div id="name" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" value="{{ old('slug') }}" name="slug" aria-describedby="helpName">

                            @error('slug')
                              <div id="slug" class="invalid-feedback">
                                {{ $message }}
                              </div>    
                            @enderror
                      
                        </div> --}}

                        <div class="d-flex flex-wrap">
                            <button type="submit"
                                class="bg_link_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3">
                                Modifica categoria
                            </button>
                            <a href="{{ route('admin.categories.index') }}"
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
