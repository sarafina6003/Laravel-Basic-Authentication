@extends('layouts.app')

@section('content')
    @if(isset($error_msg))
        <h1>{{ $error_msg }}</h1>
    @else <h1>Įvyko klaida. Šio puslapio pasiekti negalite.</h1>
    @endif
@endsection