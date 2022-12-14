@extends('layouts.app')

@section('content')
    <?php
    if(isset($_GET['id'])) {
        $id = $_GET['id']; // è lo user id del proprietario del ristorante
    }
    ?>
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-center">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        Lista ordini
                    </h1>
                </div>
                <div class="d-flex flex-lg-wrap align-items-center justify-content-center box_shadow_stroke p-3">
                    {{-- <a href="{{ route('admin.orders.create') }}" class="btn btn-primary" title="Add order">
                        Add order
                    </a> --}}
                    <a href="{{ route('admin.chart', $restaurant->id) }}"
                        class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                        Statistiche ordini
                    </a>
                    <a href="{{ route('admin.home') }}"
                        class="bg_seco_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                        Torna alla home
                    </a>
                </div>
            </div>
            <div class="body_content py-5 d-flex flex-wrap justify-content-center">
                @foreach ($orders as $order)
                    @php
                        $fullname_client = $order->name_client . ' ' . $order->surname_client;
                        $status = ['Cancellato', 'In elaborazione', 'In lavorazione', 'Completato', 'In transito', 'In consegna'];
                    @endphp
                    <div class="m-3 card_content box_shadow_stroke pt-3">
                        <div class="d-flex flex-column h-100">
                            {{-- <span class="h6 text-capitalize">
                                {{ $restaurant->name }}
                            </span> --}}
                            <div class="d-flex flex-wrap align-items-center stroke_bottom">
                                <h3 class="pl-2">
                                    {{ $fullname_client }}
                                </h3>
                                <span class="h4 pr-2 ml-auto">
                                    &euro;{{ $order->total }}
                                </span>
                            </div>
                            <div class="flex_grow stroke_bottom">
                                <ul class="overflow-hidden px-0 list_wrapper mb-0 p-2">
                                    <li class="list_item">{{ $order->address_client }}</li>
                                    {{-- <li class="list_item overflow-auto">{{ $order->phone_client }}</li> --}}
                                    {{-- <li class="list_item overflow-auto">{{ $order->email_client }}</li> --}}
                                    {{-- <li class="list_item overflow-auto">{{ $order->created_at }}</li> --}}
                                </ul>
                            </div>
                            <div class="d-flex px-2 py-2 flex-wrap align-items-end justify-content-start card_button_wrapper">
                                <a href="{{ route('admin.orders.show', $order) }}" class="bg_link_color c_text_color box_shadow_stroke_small py-1 px-2 m-1 card_button mb-2">
                                    Vai all'ordine
                                </a>
                                <form action="{{ route('admin.orders.update', $order) }}" method="POST"
                                    class="my-2 d-flex align-items-center">
                                    @csrf
                                    @method('PUT')

                                    <select class="card_select bg_text_color c_prim_color box_shadow_stroke_small py-1 px-2 m-1 mb-2 @error('status') is-invalid @enderror" id="status"
                                        name="status">
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
                                    @if(isset($id))
                                    <input type="hidden" value="{{ $id }}" name="id">
                                    @endif

                                    <button type="submit" class="bg_text_color c_prim_color box_shadow_stroke_small px-1 m-1 card_button card_button_dark mb-2">
                                        Conferma
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
