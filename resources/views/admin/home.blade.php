@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center py-5">
                <h1>Sei loggato come {{ $user->name }}</h1>

            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center container flex-wrap">
        <img src="{{ $restaurant->image_path }}" height="200" alt="" class="col-12 col-md-6">
        <ul style="list-style: none; font-size: 25px" class="col-12 col-md-6">
            <li>
                Nome: {{ $restaurant->name }}
            </li>
            <li>
                Indirizzo: {{ $restaurant->address }}
            </li>
            <li>
                Numero di Telefono: {{ $restaurant->phone }}
            </li>
            <li>
                Numero P.IVA: {{ $restaurant->p_iva }}
            </li>
            <li>
                Email: {{ $user->email }}
            </li>
            <li>
                Categorie:
                <ul>
                    @foreach ($restaurant->categories as $category)
                        <li>
                            {{ $category->name }}
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.plates.index') }}" type="button" class="btn btn-warning btn-sm">I tuoi
                    piatti</a>
            </li>
            <li>
                <a href="{{ route('admin.orders.index') }}" type="button" class="btn btn-warning btn-sm">I tuoi
                    ordini</a>
            </li>
            <li>
                <a href="{{ route('admin.restaurant.edit', $restaurant->id) }}" type="button"
                    class="btn btn-warning btn-sm">Modifica Ristorante</a>
            </li>
            <li>
                <form action="{{ route('admin.restaurant.destroy', $restaurant) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Elimina" class="btn btn-danger btn-sm">
                </form>
            </li>
        </ul>
    </div>



    </div>
@endsection
