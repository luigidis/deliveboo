@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Modifica il tuo ristorante</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.restaurant.update', $restaurant) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $restaurant->name) }}" aria-describedby="helpname">
                        <small id="helpname" class="form-text text-muted">Modifica nome del tuo ristorante</small>
                        @error('name')
                            <div id="name" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    {{-- <div class="form-group">
                        <label for="category">Categoria</label>
                        <select name="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                            <option value="">-- nessuna -- </option>
                            @foreach ($categories as $category)
                                <option @if (old('category_id ') === $category->id) selected @endif value="{{ $category->id }}">
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <small id="helpCategory" class="form-text text-muted">Modifica la tua categoria</small>
                        @error('category_id')
                            <div id="category" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}


                    <div class="form-group">
                        <label class="d-block" for="category">Categorie:</label>
              
                        <div class="@error('categories') is-invalid @enderror">

                            @foreach($categories as $key => $category)
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" name="categories[]" @if( in_array($category->id, old('categories', $restaurant->categories->pluck('id')->all()) ) ) checked @endif type="checkbox" id="category-{{$category->id}}" value="{{ $category->id }}">
                                <label class="form-check-label" for="category-{{$category->id}}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('categories')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Indirizzo</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" value="{{ old('address', $restaurant->address) }}" aria-describedby="helpname">
                        <small id="helpname" class="form-text text-muted">Modifica indirizzo del tuo ristorante</small>
                        @error('address')
                            <div id="address" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Numero di telefono</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" value="{{ old('phone', $restaurant->phone) }}" aria-describedby="helpname">
                        <small id="helpname" class="form-text text-muted">Modifica il contatto telefonico</small>
                        @error('phone')
                            <div id="phone" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="p_iva">Partita IVA</label>
                        <input type="text" class="form-control @error('p_iva') is-invalid @enderror" id="p_iva"
                            name="p_iva" value="{{ old('p_iva', $restaurant->p_iva) }}" aria-describedby="helpname">
                        <small id="helpname" class="form-text text-muted">Modifica la Partita IVA del tuo
                            ristorante</small>
                        @error('p_iva')
                            <div id="p_iva" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- <h3>Errori</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <button type="submit" class="btn btn-primary">Salva!</button>
                </form>
             
            </div>
        </div>
    </div>
@endsection
