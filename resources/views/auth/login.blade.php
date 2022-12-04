@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="header_content d-flex flex-wrap justify-content-between align-items-center">
                <div class="box_shadow_stroke py-2 px-3 mb-3">
                    <h1 class="m-0">
                        {{ __('Accedi') }}
                    </h1>
                </div>
            </div>
            <div class="body_content py-2 form_container">
                <div class="box_shadow_stroke card_form">
                    <form method="POST" action="{{ route('login') }}" class="d-flex flex-column justify-content-center">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-6 col-form-label">{{ __('Indirizzo e-mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror box_shadow_stroke"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror box_shadow_stroke"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label pl-3" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 d-flex flex-wrap justify-content-center">
                                <button type="submit" class="col-12 bg_link_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3">
                                    {{ __('Accedi') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="col-12 bg_seco_color c_text_color box_shadow_stroke_small px-2 py-1 card_button mb-3 text-center" href="{{ route('password.request') }}">
                                        {{ __('Hai dimenticato la tua password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
