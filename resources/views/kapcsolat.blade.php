@extends('layouts.app')

@section('title', 'Kapcsolat')

@section('content')
    <h1>Kapcsolat</h1>

    @if (session('success'))
        <div style="padding:10px; background:#d4edda; color:#155724; border-radius:5px; margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('kapcsolat.submit') }}">
        @csrf

        <label for="nev">Név:</label>
        <input type="text" id="nev" name="nev" value="{{ old('nev') }}" required>
        @error('nev') <p style="color:red;">{{ $message }}</p> @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email') <p style="color:red;">{{ $message }}</p> @enderror

        <label for="tema">Téma:</label>
        <input type="text" id="tema" name="tema" value="{{ old('tema') }}">
        @error('tema') <p style="color:red;">{{ $message }}</p> @enderror

        <label for="uzenet">Üzenet:</label>
        <textarea id="uzenet" name="uzenet" required>{{ old('uzenet') }}</textarea>
        @error('uzenet') <p style="color:red;">{{ $message }}</p> @enderror

        <button type="submit" class="button primary">Küldés</button>
    </form>
@endsection
