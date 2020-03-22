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
    >
        @include('layouts.default.preloader')
    </topicos>
</div>


@endsection

@section('scripts')
    <script src="/js/topicos.js"></script>
@endsection
