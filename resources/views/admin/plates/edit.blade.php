@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-8">
      <h1>Edit plate : {{ $plate->name }}</h1>
    </div>
  </div>
</div>
<div class="container-fluid">
  <form action="{{ route('admin.plates.update',$plate) }}" method="POST">
  
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="img">Img</label>

      <div class="custom-file">
        <input type="file" name="img" class="custom-file-input  @error('img')is-invalid @enderror" id="img">
        <label class="custom-file-label" for="img">Choose a file</label>
        @error('img')
          <div id="img" class="invalid-feedback">
            {{ $message }}
          </div>    
        @enderror
      </div>
      
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" value="{{ old('name',$plate->name) }}" name="name" aria-describedby="helpName">
      <small id="helpNitle" class="form-text text-muted">Name</small>
      @error('name')
        <div id="name" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror

    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control  @error('description')is-invalid @enderror" id="description" name="description" rows="5">{{ old('description',$plate->description)}}</textarea>
      <small id="helpDescription" class="form-text text-muted">Description</small>
      @error('description')
        <div id="title" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror
    </div>

    <div class="form-group">
      <label for="price">Price €</label>
      <input type="text" class="form-control @error('price')is-invalid @enderror" id="price" value="{{ old('price',$plate->price) }}" name="price" aria-describedby="price">
      @error('price')
        <div id="price" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror

    </div>

    <div class="form-group">
      <label for="availability">Availability</label><br>
      <input type="radio" name="available">
      <label for="sì">available</label>
      <input type="radio" name="not available">
      <label for="no">not available</label><br>
    </div>        
    
    <button type="submit" class="btn btn-secondary">Edit</button>
  </form>
</div>
@endsection