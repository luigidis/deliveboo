@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="form">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>


                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control input-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    <div class="error"></div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control input-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email">
                                    <div class="error"></div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>


                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control input-control @error('password') is-invalid @enderror"
                                        name="password" autocomplete="new-password">
                                    <div class="error"></div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>


                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control input-control"
                                        name="password_confirmation" autocomplete="new-password">
                                    <div class="error"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">Nome
                                    Attività</label>


                                <div class="col-md-6">
                                    <input id="restaurant_name" type="string" name="restaurant_name" value="{{ old('restaurant_name') }}"
                                        class="form-control input-control 
                                @error('restaurant_name') is-invalid @enderror">
                                    <div class="error"></div>
                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo</label>


                                <div class="col-md-6">
                                    <input id="address" type="string" name="address" value="{{ old('address') }}"
                                        class="form-control input-control @error('address') is-invalid @enderror">
                                    <div class="error"></div>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Numero di
                                    telefono</label>


                                <div class="col-md-6">
                                    <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                                        class="form-control input-control @error('phone') is-invalid @enderror">
                                    <div class="error"></div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="p_iva" class="col-md-4 col-form-label text-md-right">Partita Iva</label>


                                <div class="col-md-6">
                                    <input id="p_iva" type="string" name="p_iva" value="{{ old('p_iva') }}"
                                        class="form-control input-control @error('p_iva') is-invalid @enderror">
                                    <div class="error"></div>
                                    @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            <?php
                            use App\Category;
                            $categories = Category::orderBy('name', 'asc')->get();
                            ?>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="category">Categorie:</label>

                                <div class="col-md-6">
                                    <div class="@error('categories') is-invalid @enderror" id="categories">

                                        @foreach ($categories as $key => $category)
                                        <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="categories[]"
                                                    @if (in_array($category->id, old('categories', []))) checked @endif type="checkbox"
                                                    id="category-{{ $category->id }}" value="{{ $category->id }}">
                                                <label class="form-check-label"
                                                    for="category-{{ $category->id }}">{{ $category->name }}</label>
                                            </div>
                                        @endforeach
                                        <div id="errorCat"></div>
                                    </div>

                                    @error('categories')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Scegli
                                    immagine</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                        id="image" name="image" value="{{ old('image') }}">
                                    <div class="error"></div>
                                </div>
                                @error('image')
                                    <div id="image" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="submitBtn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-js')
    <script src={{asset('js/register.js')}}></script>
@endsection