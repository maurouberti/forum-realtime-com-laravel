@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h3>{{ __('lang33') }}</h3>

                <div>
                    <form method="POST" action="/profile" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                                <label for="name">{{ __('lang24') }}</label>

                                @error('name')
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="photo" type="file" class="form-control" name="photo">
                                <label for="photo">{{ __('lang39') }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                <label for="email">{{ __('lang20') }}</label>

                                @error('email')
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password">{{ __('lang21') }}</label>

                                @error('password')
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm">{{ __('lang18') }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <button type="submit" class="waves-effect waves-light btn">
                                {{ __('lang25') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
