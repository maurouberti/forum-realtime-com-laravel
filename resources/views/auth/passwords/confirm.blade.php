@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h3>{{ __('lang18') }}</h3>

                <div>
                    {{ __('lang30') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

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
                            <button type="submit" class="waves-effect waves-light btn">
                                {{ __('lang18') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn red accent-2" href="{{ route('password.request') }}">
                                    {{ __('lang23') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
