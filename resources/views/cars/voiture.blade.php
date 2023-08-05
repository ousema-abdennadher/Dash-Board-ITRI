@extends('layout')
@section('title', 'Vehicules')
@section('second_title', 'Vehicules')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Tableaux des Livreurs par voiture </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Nom et Prenom</th>
                            <th>Numéro de Téléphone</th>
                            <th>E-mail</th>
                            <th>Date de Conduite</th>


                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($voitures as $voiture)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$voiture->livreur->nom}} {{$voiture->livreur->prenom}}</td>
                            <td>{{$voiture->livreur->tel}}</td>
                            <td>{{$voiture->livreur->email}}</td>
                            <td>{{$voiture->date}}</td>
                            @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Num</th>
                            <th>Nom et Prenom</th>
                            <th>Numéro de Téléphone</th>
                            <th>E-mail</th>
                            <th>Date de Conduite</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection