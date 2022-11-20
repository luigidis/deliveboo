@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between">
                <div>
                    <h1>
                        Order #{{ $order->id }}
                    </h1>
                    <h3>
                        {{ $fullname_client }}
                    </h3>
                    <h3>
                        {{ $order->total }} $
                    </h3>

                </div>
                <div class="d-flex align-items-end justify-content-end">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-danger" title="Back to order">
                        Back to orders
                    </a>
                </div>
            </div>
            <div class="body_content py-5 d-flex flex-wrap justify-content-center">
                @foreach ($plates as $plate)
                    <div class="card mx-auto mb-3" style="max-width: 320px; max-height: 400px; flex-grow:1;">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <h3 class="text-capitalize">
                                    {{ $plate->name }}
                                </h3>
                                <span class="h4 mb-0">
                                    {{ $plate->price }}$
                                </span>
                            </div>
                            <p class="card-text" style="flex-grow:1;">{{ $plate->address_client }}</p>
                            <div class="d-flex p-2 flex-wrap align-items-center justify-content-between">
                                <a href="#" class="btn btn-primary my-2">Update</a>
                                <a href="#" class="btn btn-outline-success my-2">Complete</a>
                                <form action="{{ route('admin.orders.destroy', $plate) }}" method="POST" style="flex-basis: 100%;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger" style="width: 100%">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
