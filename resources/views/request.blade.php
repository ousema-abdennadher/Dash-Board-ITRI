@extends('layout')
@section('title', 'Les Demandes')
@section('second_title', 'Les Demandes')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Tableaux des Demandes des Citoyens</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first" data-toggle="table">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Nom et Prenom Citoyen</th>
                            <th>Nom et Prenom Livreur</th>
                            <th>Date de demande</th>
                            <th>Points a Obtenir</th>
                            <th>Etat de l'Ordre</th>
                            <th>Creer le </th>
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
                        @foreach ($persons as $person)
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
                            

                            @endif

                            <td>{{ $request->point }}</td>
                            <td>{{ $request->created_at }}</td>
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

@endsection