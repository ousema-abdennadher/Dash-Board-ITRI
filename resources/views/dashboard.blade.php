@extends('layout')
@section('title','Tableau de Bord')
@section('second_title','Overview')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-6">
    <a href="{{ route('citoyen')}}">
        <div id="cardash" class="card text-center text-black">
            <div class="card-header"><i class="fas fa-light fa-user "></i></div>
            <div class="card-body">
                <h1 id="h1dash" class="card-title ">{{ DB::table('itri_citoyen')->count() }}</h1>
                <h3 class="card-title "> Citoyen</h3>
            </div>
        </div>
    </a>
</div>

<div class="col-xl-2 col-lg-6 col-md-6col-sm-6 col-6">
    <a href="{{ route('request')}}">
        <div id="cardash" class="card text-center text-black">
            <div class="card-header"><i class="fas fa-shopping-cart "></i></div>
            <div class="card-body">
                <h1 id="h1dash" class="card-title ">{{ DB::table('itri_request')->count() }}</h1>
                <h3 class="card-title ">Demandes</h3>
            </div>
        </div>
    </a>
</div>

<div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-6">
    <a href="{{ route('livreur')}}">
        <div id="cardash" class="card text-center text-black">
            <div class="card-header "><i class="fa fa-solid fa-truck "></i></div>
            <div class="card-body">
                <h1 id="h1dash" class="card-title ">{{ DB::table('itri_livreur')->count() }} </h1>
                <h3 class="card-title ">Livreur</h3>
            </div>
        </div>
    </a>
</div>

<div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-6">
    <a href="{{ route('vehicule')}}">
        <div id="cardash" class="card text-center text-black">
            <div class="card-header "><i class="fas fa-solid fa-car "></i></div>
            <div class="card-body">
                <h1 id="h1dash" class="card-title ">{{ DB::table('itri_vehicule')->count() }}</h1>
                <h3 class="card-title ">Véhicule</h3>
            </div>
        </div>
    </a>
</div>

<div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-6">
    <a href="{{ route('dechet')}}">
        <div id="cardash" class="card text-center text-black">
            <div class="card-header"><i class="fas fa-solid fa-trash"></i></div>
            <div class="card-body">
                <h1 id="h1dash" class="card-title ">{{ DB::table('itri_dechet')->count() }}</h1>
                <h3 class="card-title ">Déchet</h3>
            </div>
        </div>
    </a>
</div>
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <canvas id="chart"></canvas>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <canvas id="chart2"></canvas>
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Tableaux des Demandes des Citoyens</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Nom et Prenom Citoyen</th>
                            <th>Nom et Prenom Livreur</th>
                            <th>Date de demande</th>
                            <th>Points a Obtenir</th>
                            <th>Etat de l'Ordre</th>
                            <th>Type de dechet</th>
                            <th>Sous_Type de dechet</th>
                            <th>Objet de dechet</th>
                            <th>Poids Reel</th>
                            <th>Poids Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @php($persons = $requests->unique('citizen_nom', 'citizen_prenom'))
                        @php($sortedPersons = $persons->sortByDesc('date')->take(3)) {{-- Sort and take the last 3 elements --}}
                        @foreach ($sortedPersons as $person)
                        @php($colisCount = $requests->where('citizen_nom', $person->citizen_nom)->where('citizen_prenom', $person->citizen_prenom)->count())
                        @php($rowIndex = 0)
                        @php($sumPoidsReel = 0)

                        @foreach ($requests->where('citizen_nom', $person->citizen_nom)->where('citizen_prenom', $person->citizen_prenom) as $request)

                        <tr>
                            @if ($rowIndex === 0)
                            <td rowspan="{{ $colisCount }}">{{ $i++ }}</td>
                            <td rowspan="{{ $colisCount }}">{{ $person->citizen_nom }} {{ $person->citizen_prenom }}</td>
                            <td rowspan="{{ $colisCount }}">{{ $person->delivery_nom }} {{ $person->delivery_prenom }}</td>
                            <td rowspan="{{ $colisCount }}">{{ \Carbon\Carbon::parse($person->date)->locale('fr_FR')->isoFormat('LLL') }}</td>
                            <td rowspan="{{ $colisCount }}">{{ $person->point }}</td>
                            <td rowspan="{{ $colisCount }}">{{ $person->status }}</td>
                            @endif

                            <td>{{ $request->type }}</td>
                            <td>{{ $request->sous_type }}</td>
                            <td>{{ $request->objet }}</td>
                            <td>{{ $request->poids_reel }}</td>
                            @php($sumPoidsReel += $request->poids_reel)
                            @if ($rowIndex === $colisCount - 1)
                            <td>{{ $sumPoidsReel }}</td>
                            @endif
                        </tr>

                        @php($rowIndex++)
                        @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Num</th>
                            <th>Nom et Prenom Citoyen</th>
                            <th>Nom et Prenom Livreur</th>
                            <th>Date de demande</th>
                            <th>Points a Obtenir</th>
                            <th>Etat de l'Ordre</th>
                            <th>Type de dechet</th>
                            <th>Sous_Type de dechet</th>
                            <th>Objet de dechet</th>
                            <th>Poids Reel</th>
                            <th>Poids Total</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div id="piechart"></div>
    </div>
</div> -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById('chart').getContext('2d');
    var demandechart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: JSON.parse('{!! json_encode($label1) !!}'),
            datasets: JSON.parse('{!! json_encode($datasets1) !!}'),
        },
    });
    var ctx = document.getElementById('chart2').getContext('2d');
    var demandechart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: JSON.parse('{!! json_encode($label2) !!}'),
            datasets: JSON.parse('{!! json_encode($datasets2) !!}'),
        },
    });




    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work', 11],
            ['Eat', 2],
            ['Commute', 2],
            ['Watch TV', 2],
            ['Sleep', 7]
        ]);

        var options = {
            title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
@endsection