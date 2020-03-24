@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h3>{{ __('lang15') }}</h3>

                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password">{{ __('lang21') }}</label>

                                @error('password')
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label>
                                <input class="filled-in" type="checkbox" name="remember" id="remember" checked="{{ old('remember') ? 'checked' : '' }}">
                                <span>
                                    {{ __('lang22') }}
                                </span>
                            </label>
                        </div>

                        <div class="row">
                            <button type="submit" class="waves-effect waves-light btn">
                                {{ __('lang15') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="waves-effect waves-light btn" href="{{ route('password.request') }}">
                                    {{ __('lang23') }}
                                </a>
                            @endif

                            <a class="btn indigo" href="/login/facebook">
                                Facebook
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
