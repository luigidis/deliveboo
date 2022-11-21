@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>
      {{ $plate->name }}
    </h1>
    <h3>
      {{ $plate->slug }}
    </h3>
    <img src="{{ $plate->image_path }}" width="400" alt="{{ $plate->name }}">
    <p>
      {{ $plate->description }}
    </p>
    <div>
      <span>Availability</span> 
      <ul>
        <li>
          @if ($plate->is_visible)
            available
          @else 
            not available
          @endif
        </li>
      </ul>
    </div>
    <div>
      <p><strong>Price</strong> : {{ $plate->price }} € </p>
      <p><strong>Reference restaurant</strong> : {{ $plate->restaurant_id }} </p>
    </div>
    <div class="d-flex justify-content-between">
      <a href="{{ route('admin.plates.edit',$plate) }}" type="button" class="btn btn-secondary btn-lg">Edit plate</a>

      <form action="{{ route('admin.plates.destroy',$plate) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete plate" class="btn btn-danger btn-lg">
      </form>
    </div>
  </div>
  



@endsection