@extends('layouts.app')

@section('title', 'Városvégi Gimnázium – Főoldal')

@section('content')
    <header class="main">
        <h1>Városvégi Gimnázium – Elektronikus napló</h1>
    </header>

    <section>
        <p>
            Üdvözlünk a Városvégi Gimnázium elektronikus naplójában!  
            Itt nyomon követheted a diákok tanulmányi eredményeit, a tantárgyakat és a jegyeket.  
            Az oldal célja, hogy a tanárok, diákok és szülők könnyen átláthassák az iskolai adatokat.
        </p>

        <div class="features">
            <article>
                <span class="icon solid fa-users"></span>
                <div class="content">
                    <h3>Diákok</h3>
                    <p>A gimnázium összes tanulójának adatai, osztályonként csoportosítva.</p>
                    <a href="{{ url('/diak') }}" class="button small">Megnyitás</a>
                </div>
            </article>
            <article>
                <span class="icon solid fa-book"></span>
                <div class="content">
                    <h3>Tantárgyak</h3>
                    <p>Az oktatott tantárgyak listája és kategóriái (humán, reál, nyelv, művészetek).</p>
                    <a href="{{ url('/targy') }}" class="button small">Megnyitás</a>
                </div>
            </article>
            <article>
                <span class="icon solid fa-star"></span>
                <div class="content">
                    <h3>Jegyek</h3>
                    <p>A diákok értékelései, dátumokkal és típusokkal, tárgyanként rendezve.</p>
                    <a href="{{ url('/jegy') }}" class="button small">Megnyitás</a>
                </div>
            </article>
        </div>
    </section>

    <section>
        <header class="major">
            <h2>Iskolánkról</h2>
        </header>
        <p>
            A Városvégi Gimnázium egy 4 évfolyamos középiskola, ahol több száz diák tanul nap mint nap.
            Intézményünk a modern oktatást és a digitális eszközhasználatot támogatja, ezért fejlesztettük ki ezt az elektronikus naplót.
            A rendszer lehetővé teszi a jegyek, tárgyak és tanulók egyszerű, átlátható kezelését.
        </p>
        <img src="{{ asset('assets/images/pic01.jpg') }}" alt="Iskola épülete" 
        style="max-width:100%; border-radius:15px; box-shadow: 0 4px 20px rgba(0,0,0,0.2); transition: transform 0.3s;"
        onmouseover="this.style.transform='scale(1.03)'"
        onmouseout="this.style.transform='scale(1)'">
    </section>
@endsection

