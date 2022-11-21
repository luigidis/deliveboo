@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-between">
    <div class="col-8">
      <h1>Modifica il piatto : {{ $plate->name }}</h1>
    </div>
    <div>
      <a href="{{ route('admin.plates.index') }}"><button type="button" class="btn btn-warning btn-lg">Torna indietro</button></a>   
    </div>
  </div>
</div>
<div class="container">
  <form action="{{ route('admin.plates.update',$plate) }}" method="POST" enctype="multipart/form-data">
  
    @csrf
    @method('PUT')
    <input type="hidden" name="restaurant_id" value="{{ $plate->restaurant_id }}">
    <div class="form-group">
      <label for="img">Foto del piatto</label>

      <div class="custom-file">
        <input type="file" name="img" class="custom-file-input  @error('img')is-invalid @enderror" id="img">
        <label class="custom-file-label" for="img">Scegli un file</label>
        @error('img')
          <div id="img" class="invalid-feedback">
            {{ $message }}
          </div>    
        @enderror
      </div>
      
    </div>

    <div class="form-group">
      <label for="name">Nome del piatto</label>
      <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" value="{{ old('name',$plate->name) }}" name="name" aria-describedby="helpName">
      <small id="helpNitle" class="form-text text-muted">Name</small>
      @error('name')
        <div id="name" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror

    </div>

    <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea class="form-control  @error('description')is-invalid @enderror" id="description" name="description" rows="5">{{ old('description',$plate->description)}}</textarea>
      <small id="helpDescription" class="form-text text-muted">Description</small>
      @error('description')
        <div id="title" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror
    </div>

    <div class="form-group">
      <label for="price">Prezzo €</label>
      <input type="text" class="form-control @error('price')is-invalid @enderror" id="price" value="{{ old('price',$plate->price) }}" name="price" aria-describedby="price">
      @error('price')
        <div id="price" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror

    </div>
    <div class="form-group">
      <label for="is_visible">Disponibilità</label>
      <input type="number" name="is_visible" class="form-control @error('is_visible') is-invalid @enderror" id="is_visible" placeholder="Enter the availability" min="0" max="1" value="{{ $plate->is_visible }}" required>
    </div>
    <button type="submit" class="btn btn-secondary">Modifica</button>
  </form>
</div>
@endsection