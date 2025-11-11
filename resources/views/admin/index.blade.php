@extends('layouts.app')
@section('title','Admin')
@section('content')
  <header class="main"><h1>Admin felület</h1></header>
  <p>Üdv, {{ auth()->user()->name }}!</p>
  <ul>
    <li><a href="{{ route('diagram') }}">Diagramok</a></li>
    <li><a href="{{ route('diakok.index') }}">Diákok (CRUD)</a></li>
    <li><a href="{{ route('uzenetek') }}">Beérkezett üzenetek</a></li>
  </ul>
@endsection
