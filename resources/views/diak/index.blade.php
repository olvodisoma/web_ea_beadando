@extends('layouts.app')

@section('title', 'Diákok')

@section('content')
<h1>Diákok</h1>
<ul>
@foreach($diakok as $diak)
    <li>{{ $diak->nev }} ({{ $diak->osztaly }})</li>
@endforeach
</ul>
@endsection
