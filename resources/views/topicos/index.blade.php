@extends('layouts.default')

@section('content')
<div class="container">
    <h3>{{ __('lang1') }}</h3>
    <topicos>
        @include('layouts.default.preloader')
    </topicos>
</div>


@endsection

@section('scripts')
    <script src="/js/topicos.js"></script>
@endsection
