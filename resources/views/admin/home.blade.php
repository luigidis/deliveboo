@extends('layouts.app')

@section('content')
    {{-- CREARE LA VISTA DEL RISTORANTE --}}


{{-- @dump('$restaurant') --}}


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center py-5">
                <h1>Sei loggato come {{ $user->name }}</h1>

            </div>
            <div class="col-12  d-flex justify-content-center">
                <ul style="list-style: none; font-size: 25px">
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
                        <a href="{{ route('admin.restaurant.edit', $restaurant->id) }}" type="button"
                        class="btn btn-warning btn-sm">Modifica Ristorante</a>
                    </li>
                    <li>
                        <form action="{{ route('admin.restaurant.destroy', $restaurant) }}" method="POST">
                            @csrf
                            @method('DELETE')
        
                            <input type="submit" value="Elimina" class="btn btn-danger btn-sm ml-2">
                        </form>
                    </li>
                </ul>
            </div>



        </div>

    </div>


    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <span>{{ $restaurant->name }}</span>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
