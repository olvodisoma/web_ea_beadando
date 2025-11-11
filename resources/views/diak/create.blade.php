@extends('layouts.app')
@section('title','Új diák')
@section('content')
<header class="main"><h1>Új diák hozzáadása</h1></header>

@if ($errors->any())
  <ul class="errors">
    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
  </ul>
@endif

<form method="POST" action="{{ route('diakok.store') }}">
  @csrf
  <div class="row gtr-uniform">
    <div class="col-12">
      <label>Név</label>
      <input type="text" name="nev" value="{{ old('nev') }}" required>
    </div>
    <div class="col-12">
      <label>Osztály (pl. 12/B)</label>
      <input type="text" name="osztaly" value="{{ old('osztaly') }}">
    </div>
    <div class="col-12">
      <label>Nem</label>
      <select name="fiu" required>
        <option value="1" @selected(old('fiu')==='1')>Fiú</option>
        <option value="0" @selected(old('fiu')==='0')>Lány</option>
      </select>
    </div>
    <div class="col-12">
      <button class="button primary" type="submit">Mentés</button>
      <a class="button" href="{{ route('diakok.index') }}">Vissza</a>
    </div>
  </div>
</form>
@endsection
