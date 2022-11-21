@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      <h1>Add new plate</h1>
    </div>
  </div>
</div>
<div class="container">
  <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
  
    @csrf
   
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
      <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" aria-describedby="helpName">
      <small id="helpNitle" class="form-text text-muted">Name</small>
      @error('name')
        <div id="name" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror

    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control  @error('description')is-invalid @enderror" id="description" name="description" rows="5">{{ old('description')}}</textarea>
      <small id="helpDescription" class="form-text text-muted">Description</small>
      @error('description')
        <div id="title" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror
    </div>

    <div class="form-group">
      <label for="price">Price €</label>
      <input type="text" class="form-control @error('price')is-invalid @enderror" id="price" value="{{ old('price') }}" name="price" aria-describedby="price">
      @error('price')
        <div id="price" class="invalid-feedback">
          {{ $message }}
        </div>    
      @enderror

    </div>

    <div class="form-group">
      <label for="is_visible">Availability</label>
      <input type="number" name="is_visible" class="form-control @error('is_visible') is-invalid @enderror" id="is_visible" placeholder="Enter the availability" min="0" max="1" value="" required>
    </div>

    <button type="submit" class="btn btn-secondary">Add</button>
  </form>
</div>
@endsection