@extends('layouts.app')

@section('title', 'Diagramok')

@section('content')
<header class="main"><h1>Diagramok</h1></header>

<div class="row" style="display:grid; gap:2rem">
  <section>
    <h3>Jegyek megoszlása</h3>
    <canvas id="chartJegyek" height="120"></canvas>
  </section>

  <section>
    <h3>Átlag jegy tárgyanként</h3>
    <canvas id="chartAtlagTargy" height="140"></canvas>
  </section>

  <section>
    <h3>Diákok száma osztályonként</h3>
    <canvas id="chartOsztaly" height="120"></canvas>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // PHP -> JS adatok
  const jegyekLabels = {!! json_encode(array_keys($jegyekMegoszlas)) !!};
  const jegyekData   = {!! json_encode(array_values($jegyekMegoszlas)) !!};

  const targyLabels  = {!! json_encode($atlagTargy->pluck('nev')) !!};
  const targyAtlag   = {!! json_encode($atlagTargy->pluck('atlag')) !!};

  const osztalyLabels= {!! json_encode(array_keys($diakOsztaly)) !!};
  const osztalyData  = {!! json_encode(array_values($diakOsztaly)) !!};

  // 1) Oszlopdiagram – Jegyek megoszlása
  new Chart(document.getElementById('chartJegyek'), {
    type: 'bar',
    data: { labels: jegyekLabels, datasets: [{ label: 'Darab', data: jegyekData }] },
    options: { responsive: true, scales: { y: { beginAtZero: true } } }
  });

  // 2) Vonal/Bar – Átlag jegy tárgyanként
  new Chart(document.getElementById('chartAtlagTargy'), {
    type: 'bar',
    data: { labels: targyLabels, datasets: [{ label: 'Átlag', data: targyAtlag }] },
    options: {
      responsive: true,
      plugins: { legend: { display: true } },
      scales: { y: { suggestedMin: 1, suggestedMax: 5 } }
    }
  });

  // 3) Doughnut – Diákok száma osztályonként
  new Chart(document.getElementById('chartOsztaly'), {
    type: 'doughnut',
    data: { labels: osztalyLabels, datasets: [{ label: 'Diákok', data: osztalyData }] },
    options: { responsive: true }
  });
</script>
@endsection
