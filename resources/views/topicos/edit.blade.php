@extends('layouts.default')

@section('content')
<div class="container">
    <h3>{{ $topico->title }}</h3>

    <div class="card grey lighten-4">
        <div class="card-content">
            <form action="/topicos/{{ $topico->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="input-field">
                    <input type="text" placeholder="{{ __('lang6') }}" name="titulo" value="{{ $topico->titulo }}">
                </div>
                <div class="input-field">
                    <textarea class="materialize-textarea" placeholder="{{ __('lang11') }}" name="mensagem">{{ $topico->mensagem }}</textarea>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn red accent-2">{{ __('lang4') }}</button>

                    <a class="waves-effect waves-light btn" href="/topicos/{{ $topico->id }}">{{ __('lang12') }}</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection