@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="head_content10">
                    <a href="{{ route('admin.categories.index') }}"><button type="button" class="btn btn-warning btn-lg btn__header__item mt-3 mb-3">Torna indietro</button></a>   
                    <h1>
                        Modifica Categoria
                    </h1>
                    
                </div>
            </div>
            <div class="container">
                <form action="{{ route('admin.categories.update',$category) }}" method="POST"> 
                    @csrf
                    @method('PUT')
                    
                        <div class="form-group">
                            <label for="name">Nome Categoria</label>
                            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" value="{{ old('name',$category->name) }}" name="name" aria-describedby="helpName">

                            @error('name')
                              <div id="name" class="invalid-feedback">
                                {{ $message }}
                              </div>    
                            @enderror
                      
                        </div>

                        {{-- <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" value="{{ old('slug') }}" name="slug" aria-describedby="helpName">

                            @error('slug')
                              <div id="slug" class="invalid-feedback">
                                {{ $message }}
                              </div>    
                            @enderror
                      
                        </div> --}}
                    
                    <button type="submit" class="btn btn-secondary">Aggiungi Categoria</button>
                </form>
            </div>
                
            @endsection