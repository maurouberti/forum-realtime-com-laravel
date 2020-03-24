@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h3>{{ __('lang17') }}</h3>

                <div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('lang26') }}
                        </div>
                    @endif

                    {{ __('lang27') }}
                    {{ __('lang28') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn red accent-2">{{ __('lang29') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
