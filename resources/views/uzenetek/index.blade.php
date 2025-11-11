@extends('layouts.app')

@section('title', 'Üzenetek')

@section('content')
<header class="main">
    <h1>Beérkezett üzenetek</h1>
</header>

@if($uzenetek->isEmpty())
    <p>Nincs üzenet az adatbázisban.</p>
@else
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Név</th>
                    <th>Email</th>
                    <th>Téma</th>
                    <th>Üzenet</th>
                    <th>Küldés ideje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uzenetek as $uzenet)
                <tr>
                    <td>{{ $uzenet->nev }}</td>
                    <td>{{ $uzenet->email }}</td>
                    <td>{{ $uzenet->tema }}</td>
                    <td>{{ Str::limit($uzenet->uzenet, 80) }}</td>
                    <td>{{ $uzenet->created_at->format('Y.m.d H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $uzenetek->links() }}
@endif
@endsection
