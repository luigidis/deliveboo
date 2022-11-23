@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-between container">
      <div>
        <h1 class="title">
          {{ $plate->name }}
        </h1>
        <h3 class="slug">
          {{ $plate->slug }}
        </h3>
      </div>
      <div>
        <a href="{{ route('admin.plates.index', ['id' => $plate->restaurant_id]) }}"><button type="button" class="btn btn-warning btn-lg">Torna indietro</button></a>   
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
    <div class="row container justify-content-between">
      <div class="py-2">
        <a href="{{ route('admin.plates.edit',$plate) }}" type="button" class="btn btn-secondary btn-lg gy-3">Modifica il piatto</a>
      </div>
      <div class="py-1">
        <form action="{{ route('admin.plates.destroy',$plate) }}" method="POST">
          @csrf
          @method('DELETE')
          <input type="submit" value="Cancella il piatto" class="btn btn-danger btn-lg">
        </form>
      </div>
    </div>
  </div>
  
@endsection

<style>
  @media all and (max-width:576px) {
    .title {
      font-size: 1.5rem;
    }
    .slug {
      font-size: 1rem;
    }
    .btn {
      scale: 0.8;
    }
  }

</style>
