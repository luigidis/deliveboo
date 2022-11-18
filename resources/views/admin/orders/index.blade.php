@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between">
                <div>
                    <h1>
                        Orders
                    </h1>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary" title="Add order">
                        Add order
                    </a>
                </div>
            </div>
            <div class="body_content py-5 d-flex flex-wrap justify-content-center">
                @foreach ($orders as $order)
                    @php
                        $fullname_client = $order->name_client . ' ' . $order->surname_client;
                    @endphp
                    <div class="card m-3 overflow-hidden" style="max-width: 320px; max-height: 400px; flex-grow:1;">
                        <div class="card-body d-flex flex-column">
                            <span class="h6">
                                {{ $order->status }}
                            </span>
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <h3>
                                    {{ $fullname_client }}
                                </h3>
                                <span class="h4">
                                    {{ $order->total }}$
                                </span>
                            </div>
                            <ul class="list-group overflow-hidden" style="flex-grow:1;">
                                <li class="list-group-item overflow-auto">{{ $order->address_client }}</li>
                                <li class="list-group-item">{{ $order->phone_client }}</li>
                                <li class="list-group-item">{{ $order->email_client }}</li>
                                <li class="list-group-item">{{ $order->created_at }}</li>
                              </ul>
                            <div class="d-flex p-2 flex-wrap align-items-center justify-content-between">
                                <a href="{{route('admin.orders.show', $order)}}" class="btn btn-secondary my-2">Show</a>
                                <a href="#" class="btn btn-outline-primary my-2">Update</a>
                                <a href="#" class="btn btn-outline-success my-2">Complete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
