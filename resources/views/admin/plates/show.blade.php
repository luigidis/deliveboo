@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-start">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        {{ $plate->name }}
                    </h1>
                    {{-- <h3 class="slug">
                        {{ $plate->slug }}
                    </h3> --}}
                </div>
                <div class="d-flex flex-lg-wrap align-items-center justify-content-center box_shadow_stroke p-3">
                    <a href="{{ route('admin.plates.index', ['id' => $plate->restaurant_id]) }}"
                        class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                        Torna ai piatti
                    </a>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center flex-wrap py-3">
                <div class="col-12 col-lg-5 img_cover box_shadow_stroke px-0 mb-3 mx-lg-3">
                    <img src="{{ $plate->image_path }}" alt="Foto {{ $plate->name }}">
                </div>
                <div class="col-12 col-lg-5 box_shadow_stroke mb-3 mx-lg-3 px-0 d-flex flex-column overflow-hidden">
                    <p class="px-2 plates stroke_bottom py-2 m-0 font_standard overflow-auto">
                        {{ $plate->description }}
                    </p>
                    <div class="w-100 px-0 stroke_bottom h4 p-2">
                        Prezzo : € {{ $plate->price }}
                    </div>
                    <div class="d-flex justify-content-between align-items-center flex-wrap px-2 py-3">
                        <a href="{{ route('admin.plates.edit', $plate) }}" type="button"
                            class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button"
                            title="Modifica il piatto">
                            Modifica il piatto
                        </a>
                        <form action="{{ route('admin.plates.destroy', $plate) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button"
                                data-toggle="modal" data-target="#exampleModal"
                                title="Elimina il piatto">
                                Elimina piatto
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog box_shadow_stroke_small rounded-0" role="document">
                                    <div class="modal-content rounded-0">
                                        <div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="px-3 py-2 d-block">&times;</span>
                                            </button>
                                            <h5 class="modal-title px-3 py-2" id="exampleModalLabel"> {{ $plate->name }} </h5>
                                        </div>
                                        <div class="modal-body font-weight-bold stroke_bottom">
                                            Vuoi eliminare questo piatto dal tuo ristorante?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2"
                                                data-dismiss="modal">
                                                Torna indietro
                                            </button>
                                            <button type="submit"
                                                class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2 ml-auto">
                                                Elimina
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
