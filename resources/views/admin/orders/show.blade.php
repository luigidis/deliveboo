@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between">
                <div>
                    <h1>
                        Order #{{$order->id}}
                    </h1>
                </div>
                <div class="d-flex align-items-end justify-content-end">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-danger" title="Back to order">
                        Back to orders
                    </a>
                </div>
            </div>
            <div class="body_content py-5">
                <div class="card mx-auto" style="max-width: 320px;">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <h3>
                                {{ $fullname_client }}
                            </h3>
                            <span class="h4 mb-0">
                                {{ $order->total }}$
                            </span>
                        </div>
                        <p class="card-text">{{ $order->address_client }}</p>
                        <div class="d-flex p-2 flex-wrap align-items-center justify-content-between">
                            <a href="#" class="btn btn-primary my-2">Update</a>
                            <a href="#" class="btn btn-outline-success my-2">Complete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
