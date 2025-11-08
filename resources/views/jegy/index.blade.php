@extends('layouts.app')

@section('title', 'Jegyek')

@section('content')
<h1>Jegyek</h1>
<ul>
@foreach($jegyek as $jegy)
    <li>
        {{ $jegy->diak->nev ?? 'Ismeretlen diák' }} –
        {{ $jegy->targy->nev ?? 'Ismeretlen tárgy' }} :
        {{ $jegy->ertek }} ({{ $jegy->tipus }})
    </li>
@endforeach
</ul>
@endsection
