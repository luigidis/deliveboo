<?php
use App\Restaurant;
?>

@extends('layouts.app')

@section('content')

    <div class="container">
        
        <div class="row justify-content-center">
            @foreach ($users as $key => $user)
            <?php
            $restaurant = Restaurant::where('user_id', $user->id)->first();
            ?>
            <div class="col-12 text-center py-5">
                <h1>Nome utente: {{ $user->name }}</h1>
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center align-items-md-start justify-content-center">
                <img class="d-block" src="{{ $restaurant->image_path }}" alt="">
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center">
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
                        <a href="{{ route('admin.plates.index',
                        ['id' => $restaurant->user_id]) }}"
                        class="btn btn-warning btn-sm">Piatti</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders.index',
                        ['id' => $restaurant->user_id]) }}"
                        class="btn btn-warning btn-sm">Ordini</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.restaurant.edit', $restaurant->id) }}"
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
            @endforeach

        </div>

    </div>

@endsection
