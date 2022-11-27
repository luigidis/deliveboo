@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-center">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        Lista categorie
                    </h1>
                </div>
                <div class="d-flex flex-lg-wrap align-items-center justify-content-center box_shadow_stroke p-3">
                    <a href="{{ route('admin.categories.create') }}"
                        class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                        Aggiungi categoria
                    </a>
                    <a href="{{ route('admin.home') }}"
                        class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                        Torna alla home
                    </a>
                </div>
            </div>
            <div class="body_content py-5 d-flex flex-wrap justify-content-center">
                @foreach ($categories as $item)
                    <div class="m-3 card_content box_shadow_stroke pt-3">
                        <div class="d-flex flex-wrap align-items-center stroke_bottom">
                            <h3 class="pl-2">
                                {{ $item->name }}
                            </h3>
                            <span class="h4 pr-2 ml-auto">
                                #{{ $item->id }}
                            </span>
                        </div>
                        <div
                            class="d-flex px-2 flex-wrap align-items-end justify-content-center card_button_wrapper flex_grow">
                            <a href="{{ route('admin.categories.edit', $item) }}" type="button"
                                class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                                Modifica
                            </a>
                            <form action="{{ route('admin.categories.destroy', $item) }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                                    Elimina categoria
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
