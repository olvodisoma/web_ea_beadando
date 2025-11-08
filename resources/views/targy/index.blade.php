@extends('layouts.app')

@section('title', 'Tantárgyak')

@section('content')
<h1>Tantárgyak</h1>
<ul>
@foreach($targyak as $targy)
    <li>{{ $targy->nev }} – {{ $targy->kategoria }}</li>
@endforeach
</ul>
@endsection
