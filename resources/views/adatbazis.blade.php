@extends('layouts.app')

@section('title', 'Adatbázis adatok')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Adatbázis adatok</h1>

    <h2 class="text-xl font-semibold mt-6 mb-2">📘 Diákok</h2>
    <table class="table-auto w-full border">
        <tr><th>Név</th><th>Osztály</th><th>Nem</th></tr>
        @foreach($diakok as $d)
            <tr>
                <td>{{ $d->nev }}</td>
                <td>{{ $d->osztaly }}</td>
                <td>{{ $d->fiu ? 'Fiú' : 'Lány' }}</td>
            </tr>
        @endforeach
    </table>

    <h2 class="text-xl font-semibold mt-6 mb-2">📚 Tantárgyak</h2>
    <table class="table-auto w-full border">
        <tr><th>Név</th><th>Kategória</th></tr>
        @foreach($targyak as $t)
            <tr><td>{{ $t->nev }}</td><td>{{ $t->kategoria }}</td></tr>
        @endforeach
    </table>

    <h2 class="text-xl font-semibold mt-6 mb-2">⭐ Jegyek</h2>
    <table class="table-auto w-full border">
        <tr><th>Diák</th><th>Tantárgy</th><th>Jegy</th><th>Típus</th><th>Dátum</th></tr>
        @foreach($jegyek as $j)
            <tr>
                <td>{{ $j->diak->nev }}</td>
                <td>{{ $j->targy->nev }}</td>
                <td>{{ $j->ertek }}</td>
                <td>{{ $j->tipus }}</td>
                <td>{{ $j->datum }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection

