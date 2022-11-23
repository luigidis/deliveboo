@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between">
                <div>
                    <h1>
                        Ordini
                    </h1>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-end">
                    {{-- <a href="{{ route('admin.orders.create') }}" class="btn btn-primary" title="Add order">
                        Add order
                    </a> --}}
                    <a href="{{ route('admin.home') }}" class="btn btn-primary col-12 mb-2">
                        Torna alla home
                    </a>
                    <a href="{{ route('admin.chart') }}" class="btn btn-success col-12">
                        Statistiche ordini
                    </a>
                </div>
            </div>
            <div class="body_content py-5 d-flex flex-wrap justify-content-center">
                @foreach ($orders as $order)
                    @php
                        $fullname_client = $order->name_client . ' ' . $order->surname_client;
                        $status = ['Cancellato', 'In elaborazione', 'In lavorazione', 'Completato', 'In transito', 'In consegna'];
                    @endphp
                    <div class="card m-3 overflow-hidden" style="max-width: 320px; max-height: 400px; flex-grow:1;">
                        <div class="card-body d-flex flex-column">
                            {{-- <span class="h6">
                                {{ $order->status }}
                            </span> --}}
                            <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="mb-2 d-flex">
                                @csrf
                                @method('PUT')

                                <select class="custom-select mr-3 @error('status') is-invalid @enderror" id="status"
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

                                <button type="submit" class="btn btn-success">
                                    Conferma
                                </button>
                            </form>
                            <span class="h6 text-capitalize">
                                {{ $restaurant->name }}
                            </span>
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <h3>
                                    {{ $fullname_client }}
                                </h3>
                                <span class="h4">
                                    {{ $order->total }}$
                                </span>
                            </div>
                            <ul class="list-group overflow-auto" style="flex-grow:1;">
                                <li class="list-group-item">{{ $order->address_client }}</li>
                                <li class="list-group-item">{{ $order->phone_client }}</li>
                                <li class="list-group-item">{{ $order->email_client }}</li>
                                <li class="list-group-item">{{ $order->created_at }}</li>
                            </ul>
                            <div class="d-flex p-2 flex-wrap align-items-center justify-content-between">
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-primary my-2">
                                    Vai all'ordine
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger">
                                        Elimina ordine
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
@endsection
