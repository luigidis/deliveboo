@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h1>Aggiungi un nuovo piatto al menù</h1>
    </div>
  </div>
</div>
<div class="container">
  <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
  
    @csrf
   
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
      <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" aria-describedby="helpName">
      @error('name')
        <div id="name" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror

    </div>

    <div class="form-group">
      <label for="description">Descrizione</label>
      <textarea class="form-control  @error('description')is-invalid @enderror" id="description" name="description" rows="5">{{ old('description')}}</textarea>
      @error('description')
        <div id="title" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror
    </div>

    <div class="form-group">
      <label for="price">Prezzo €</label>
      <input type="text" class="form-control @error('price')is-invalid @enderror" id="price" value="{{ old('price') }}" name="price" aria-describedby="price">
      @error('price')
        <div id="price" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror

    </div>

    <div class="form-group">
      <label for="is_visible">Disponibilità</label>
      <input type="number" name="is_visible" class="form-control @error('is_visible') is-invalid @enderror" id="is_visible" placeholder="Inserisci disponibilità" min="0" max="1" value="" required>
    </div>

    <button type="submit" class="btn btn-secondary">Aggiungi</button>
  </form>
</div>
@endsection