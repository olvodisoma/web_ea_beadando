@extends('layouts.app')

@section('title','Diákok (CRUD)')

@section('content')
<header class="main"><h1>Diákok (CRUD)</h1></header>

@if(session('ok'))
    <p class="alert">{{ session('ok') }}</p>
@endif

<p><a class="button" href="{{ route('diakok.create') }}">Új diák hozzáadása</a></p>

<div class="table-wrapper">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Név</th>
        <th>Osztály</th>
        <th>Nem</th>
        <th>Műveletek</th>
      </tr>
    </thead>
    <tbody>
      @forelse($diakok as $d)
      <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->nev }}</td>
        <td>{{ $d->osztaly }}</td>
        <td>{{ $d->fiu ? 'Fiú' : 'Lány' }}</td>
        <td>
          <a href="{{ route('diakok.edit',$d) }}">Szerk.</a>
          <form action="{{ route('diakok.destroy',$d) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button type="submit" onclick="return confirm('Biztos törlöd?')">Törlés</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="5">Nincs diák a rendszerben.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

{{ $diakok->onEachSide(1)->links('pagination::simple-default') }}
@endsection
