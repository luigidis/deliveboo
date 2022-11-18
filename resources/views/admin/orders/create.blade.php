@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between">
                <div>
                    <h1>
                        Create order
                    </h1>
                </div>
                <div class="d-flex align-items-end justify-content-end">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-danger" title="Back to order">
                        Back to orders
                    </a>
                </div>
            </div>
            <div class="body_content py-5 d-flex flex-wrap align-items-center justify-content-center">
                @foreach ($plates as $plate)
                    @php
                        $restaurant = $restaurants->find($plate->restaurant_id);
                    @endphp
                    <div class="card m-3 @if (!$plate->is_visible) d-none @endif overflow-hidden"
                        style="max-width: 320px; max-height: 400px;">
                        <div class="card-body d-flex flex-column">
                            <div class="text-capitalize">
                                {{ $restaurant->name }}
                                <div class="d-flex flex-wrap align-items-center justify-content-between position-relative">
                                    <a href="#" class="position-absolute"
                                        style="top: 0; left: 0; right: 0; bottom: 0;"></a>
                                    <img class="card-img-top" src="{{ $plate->img }}"
                                        alt="Image plates: {{ $plate->name }}">
                                    <h3 class="text-capitalize">
                                        {{ $plate->name }}
                                    </h3>
                                    <span class="h4 mb-0">
                                        {{ $plate->price }} $
                                    </span>
                                </div>
                            </div>
                            <p class="card-text overflow-auto">{{ $plate->description }}</p>
                            <a href="#" class="d-flex btn btn-primary my-2 justify-content-center"
                                title="Buy {{ $plate->name }} by {{ $restaurant->name }}">Buy</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
