@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="d-flex justify-content-between">
      <div>
        <h1>
          {{ $plate->name }}
        </h1>
        <h3>
          {{ $plate->slug }}
        </h3>
      </div>
      <div>
        <a href="{{ route('admin.plates.index') }}"><button type="button" class="btn btn-warning btn-lg">Torna indietro</button></a>   
      </div>
    </div>
    <img class="py-3" src="{{ $plate->image_path }}" width="400" alt="{{ $plate->name }}">
    <p>
      {{ $plate->description }}
    </p>
    <div>
      <span>Disponibilità</span> 
      <ul>
        <li>
          @if ($plate->is_visible)
            disponibile
          @else 
            non disponibile
          @endif
        </li>
      </ul>
    </div>
    <div>
      <p><strong>Prezzo</strong> : {{ $plate->price }} € </p>
      {{-- <p><strong>Ristorante</strong> : #{{ $plate->restaurant_id }}, {{ $plate->restaurant->name }} </p> --}}
    </div>
    <div class="d-flex justify-content-between">
      <a href="{{ route('admin.plates.edit',$plate) }}" type="button" class="btn btn-secondary btn-lg">Modifica il piatto</a>

      <form action="{{ route('admin.plates.destroy',$plate) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Cancella il piatto" class="btn btn-danger btn-lg">
      </form>
    </div>
  </div>
  



@endsection