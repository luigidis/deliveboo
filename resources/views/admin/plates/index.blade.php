@extends('layouts.app')

@section('content')
    <section>
        <div class="container ">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-center">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        Lista piatti
                    </h1>
                </div>
                <div class="d-flex flex-lg-wrap align-items-center justify-content-center box_shadow_stroke p-3">
                    <a href="{{ route('admin.plates.create') }}"
                        class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                        Aggiungi un nuovo piatto
                    </a>
                    <a href="{{ route('admin.home') }}"
                        class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                        Torna alla home
                    </a>
                </div>
            </div>
        </div>
        <div class="body_content py-5 d-flex flex-wrap justify-content-center">
            @foreach ($plates as $plate)
                <div class="m-3 card_content box_shadow_stroke py-3">
                    <div class="d-flex flex-column h-100">
                        {{-- <span class="h6">
                            # {{ $plate->id }}
                        </span> --}}
                        {{-- <span class="h6 text-capitalize">
                            {{ $plate->restaurant->name }}
                        </span> --}}
                        <div class="d-flex flex-wrap align-items-center justify-content-between stroke_bottom">
                            <h3 class="pl-2 col-8">
                                {{ $plate->name }}
                            </h3>
                            <span class="h4 pr-2 col-4">
                                € {{ $plate->price }}
                            </span>
                        </div>
                        <p class="overflow-auto stroke_bottom px-2 card_description py-2">
                            {{ $plate->description }}
                        </p>
                        <div class="d-flex px-2 flex-wrap align-items-center justify-content-between card_button_wrapper">
                            <a href="{{ route('admin.plates.show', $plate) }}"
                                class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                                Vedi piatto
                            </a>
                            <form action="{{ route('admin.plates.destroy', $plate) }}" method="POST" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                                    Elimina piatto
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

<style>
    .btn__header {
        gap: 1rem;
    }


    /*************************************/
    @media all and (max-width:768px) {

        .btn__header__item {
            scale: 0.8;
        }

        .header__content {
            flex-direction: column;
            align-items: center;
        }
    }

    /**************************************/
    @media all and (max-width:576px) {
        .btn__header {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    }

    /**************************************/
</style>
