@extends('layouts.app')

@section('content')
    <?php
    // devo recuperarmi lo user id
    use App\OrderPlate;
    use App\Restaurant;
    use App\Plate;

    $plates_order = OrderPlate::where('order_id', $order->id)->get();
    $plate_id = $plates_order[0]->plate_id;
    $plate = Plate::where('id', $plate_id)->first();
    $rest_id = $plate->restaurant_id;
    $restaurant = Restaurant::where('id', $rest_id)->first();
    $id = $restaurant->user_id;
    ?>
    
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-start">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        Ordine #{{ $order->id }}
                    </h1>
                    <h3>
                        {{ $fullname_client }}
                    </h3>
                    <span class="h5 d-block">
                        Data creazione ordine: {{ $order->created_at }}
                    </span>
                    <span class="h5 d-block">
                        Data ultima modifica ordine: {{ $order->updated_at }}
                    </span>
                    <span class="h5 d-block">
                        Indirizzo: {{ $order->address_client }}
                    </span>
                    <span class="h4">
                        Totale: &euro;{{ $order->total }}
                    </span>
                </div>
                <div class="d-flex flex-column align-items-end justify-content-end">
                    <form action="{{ route('admin.orders.update', $order) }}" method="POST"
                        class="my-2 d-flex align-items-center">
                        @csrf
                        @method('PUT')

                        <select
                            class="h5 card_select bg_text_color c_prim_color box_shadow_stroke_small py-1 px-2 m-1 mb-2 @error('status') is-invalid @enderror"
                            id="status" name="status">
                            @foreach ($status as $item)
                                <option @if (old('status', $order->status) == $item) selected @endif>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div id="status" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- aggiungo campo id alla request se settato --}}
                        @if(isset($id)) :
                        <input type="hidden" value="{{ $id }}" name="id">
                        @endif

                        <button type="submit"
                            class="bg_text_color c_prim_color box_shadow_stroke_small px-1 m-1 card_button card_button_dark mb-2">
                            Conferma
                        </button>
                    </form>
                    <a href="{{ route('admin.orders.index', ['id' => $plates[0]->restaurant_id]) }}"
                        class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2"
                        title="Torna agli ordini">
                        Torna agli ordini
                    </a>
                </div>
            </div>
            <div class="body_content py-5 d-flex flex-wrap justify-content-center">
                @foreach ($plates as $key => $plate)
                    <div class="m-3 card_content box_shadow_stroke pt-3">
                        <div class="d-flex flex-column h-100">
                            <div class="d-flex flex-wrap align-items-center justify-content-between stroke_bottom flex_grow">
                                <h3 class="pl-2 col-8">
                                    {{ $plate->name }}
                                </h3>
                                <span class="h4 pr-2 col-4">
                                    &euro;{{ $plate->price }}
                                </span>
                            </div>
                            <span class="stroke_bottom px-2 m-0">
                                {{ $quantity[$key] }}
                            </span>
                            <p class="overflow-auto stroke_bottom px-2 card_description py-2 m-0">
                                {{ $plate->description }}
                            </p>
                            <div
                                class="d-flex p-2 flex-wrap align-items-center justify-content-between card_button_wrapper flex_grow">
                                <a href="{{ route('admin.plates.show', $plate) }}"
                                    class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button">
                                    Vedi piatto
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
