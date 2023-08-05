@extends('layout')
@section('title', 'Vehicules')
@section('second_title', 'Vehicules')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Tableaux des Vehicules par livreur </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Marque</th>
                            <th>capacite</th>
                            <th>Charge</th>
                            <th>Date de Conduite</th>


                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($voitures as $voiture)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$voiture->vehicule->mark}}</td>
                            <td>{{$voiture->vehicule->capacite}}</td>
                            <td>{{$voiture->vehicule->charge}}</td>
                            <td>{{$voiture->date}}</td>
                            @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Num</th>
                            <th>Marque</th>
                            <th>capacite</th>
                            <th>Charge</th>
                            <th>Date de Conduite</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection