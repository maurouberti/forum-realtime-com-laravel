@extends('layouts.default')

@section('content')
<div class="container">
    <h3>{{ $result->titulo }}</h3>

    <div class="card grey lighten-4">
        <div class="card-content">
            {{ $result->mensagem }}
        </div>
    </div>

    <respostas
        lang2="{{ __('lang2') }}"
        lang3="{{ __('lang3') }}"
        lang4="{{ __('lang4') }}"
    >
        @include('layouts.default.preloader')
    </respostas>

</div>
@endsection

@section('scripts')
<script src="/js/respostas.js"></script>
@endsection