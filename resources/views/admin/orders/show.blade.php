@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex">
                <div class="col-8">
                    <h1>
                        Ordine #{{ $order->id }}
                    </h1>
                </div>
                <div class="col-4 d-flex align-items-end justify-content-end">
                    <a href="{{route('admin.orders.index')}}" class="btn btn-danger" title="Back to orders">
                        Back to orders
                    </a>
                </div>
            </div>
            <div class="body_content py-5">
                <div class="card mx-auto" style="max-width: 320px;">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <h3>{{ $fullname_client }}</h5>
                                <h4 class="mb-0">{{ $order->total }}$</h6>
                        </div>
                        <p class="card-text">{{ $order->address_client }}</p>
                        <div class="d-flex p-2 flex-wrap align-items-center justify-content-between">
                            <a href="#" class="btn btn-primary my-2">Aggiorna</a>
                            <a href="#" class="btn btn-outline-danger my-2">Termina</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
