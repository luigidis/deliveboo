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
                    <span class="d-block">
                        Data creazione ordine: {{ $order->created_at }}
                    </span>
                    <span class="d-block">
                        Data ultima modifica ordine: {{ $order->updated_at }}
                    </span>
                    <span class="d-block">
                        {{ $order->address_client }}
                    </span>
                    <span>
                        <?php
                        $tot = 0;
                        foreach ($plates as $plate) {
                            $tot += $plate->price;
                        }
                        echo $tot . '€';
                        ?>
                    </span>
                </div>
                <div class="d-flex  flex-wrap align-items-center justify-content-end">
                    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="d-flex mb-2" style="flex-grow: 1;">
                        @csrf
                        @method('PUT')

                        <select class="custom-select mr-3 @error('status') is-invalid @enderror"  id="status"
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
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-danger col-12" title="Torna agli ordini">
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
                                    {{ $plate->price }}€
                                </span>
                            </div>
                            <p class="card-text overflow-auto" style="flex-grow: 1;">
                                {{ $plate->description }}
                            </p>
                            <div class="d-flex p-2 flex-wrap align-items-center justify-content-between">
                                <a href="{{ route('admin.plates.show', $plate) }}" class="btn btn-primary my-2">
                                    Vedi Piatto
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
