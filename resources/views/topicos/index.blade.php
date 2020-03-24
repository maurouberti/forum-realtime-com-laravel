@extends('layouts.default')

@section('content')
<div class="container">
    <h3>{{ __('lang1') }}</h3>
    <topicos
        lang4="{{ __('lang4') }}"
        lang6="{{ __('lang6') }}"
        lang7="{{ __('lang7') }}"
        lang8="{{ __('lang8') }}"
        lang9="{{ __('lang9') }}"
        lang10="{{ __('lang10') }}"
        lang11="{{ __('lang11') }}"
        lang35="{{ __('lang35') }}"
        lang36="{{ __('lang36') }}"
        lang37="{{ __('lang37') }}"
        lang38="{{ __('lang38') }}"
    >
        @include('layouts.default.preloader')
    </topicos>
</div>


@endsection

@section('scripts')
    <script src="/js/topicos.js"></script>
@endsection
