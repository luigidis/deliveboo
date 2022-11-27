<?php
use App\Restaurant;
?>

@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            @foreach ($users as $key => $user)
                <?php
                $restaurant = Restaurant::where('user_id', $user->id)->first();
                ?>

                <div class="col-12 text-lg-center p-3 pt-5">
                    <h2 class="px-3">
                        Nome utente <span class="text-capitalize c_seco_color font-weight-bold">{{ $user->name }}</span>
                    </h2>
                </div>
                <div class="col-12 d-flex justify-content-center flex-wrap py-3">
                    <div class="col-12 col-lg-5 img_cover box_shadow_stroke px-0 mb-3 mx-lg-3">
                        <img src="{{ $restaurant->image_path }}" alt="Foto {{ $restaurant->name }}">
                    </div>
                    <div class="col-12 col-lg-5 box_shadow_stroke mb-3 mx-lg-3 px-0 d-flex flex-column">
                        <h3 class="stroke_bottom px-2 h2">
                            {{ $restaurant->name }}
                        </h3>
                        <ul class="px-2 py-3 font_standard mb-0 stroke_bottom flex_grow">
                            <li>
                                <span class="h5 font-weight-bold">Indirizzo:</span>
                                {{ $restaurant->address }}
                            </li>
                            <li>
                                <span class="h5 font-weight-bold">Numero i telefono: </span>
                                {{ $restaurant->phone }}
                            </li>
                            <li>
                                <span class="h5 font-weight-bold">P.VA: </span>
                                {{ $restaurant->p_iva }}
                            </li>
                            <li>
                                <span class="h5 font-weight-bold">Email:</span>
                                {{ $user->email }}
                            </li>
                            <li>
                                <ul class="px-0 py-3 d-flex flex-wrap">
                                    @foreach ($restaurant->categories as $category)
                                        <li class="mr-3 px-2 box_shadow_stroke_small bg_text_color c_seco_color">
                                            {{ $category->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-between align-items-center flex-wrap px-2 py-3 stroke_bottom">
                            <a href="{{ route('admin.orders.index', ['id' => $restaurant->user_id]) }}"
                                class="bg_text_color c_prim_color box_shadow_stroke_small py-1 px-2 m-1 card_button card_button_dark"
                                title="Visualizza gli ordini tuo Ristorante">
                                Visualizza Ordini
                            </a>
                            <a href="{{ route('admin.plates.index', ['id' => $restaurant->user_id]) }}"
                                class="bg_text_color c_prim_color box_shadow_stroke_small py-1 px-2 m-1 card_button card_button_dark"
                                title="Visualizza i piatti del tuo Ristorante">
                                Visualizza Piatti
                            </a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center flex-wrap px-2 py-3">
                            <a href="{{ route('admin.restaurant.edit', $restaurant->id) }}"
                                class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button"
                                title="Modifica il tuo Ristorante">
                                Modifica Ristorante
                            </a>
                            <form action="{{ route('admin.restaurant.destroy', $restaurant) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button"
                                    title="Elimina il tuo Ristorante">
                                    Elimina ristorante
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
