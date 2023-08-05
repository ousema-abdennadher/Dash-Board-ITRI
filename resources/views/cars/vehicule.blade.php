@extends('layout')
@section('title','Véhicules')
@section('second_title','Véhicules')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Tableaux des Véhicules</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Marque</th>
                            <th>Capacité Total</th>
                            <th>Charge</th>
                            <th>Etat</th>
                            <th>Info</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($data as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->mark}}</td>
                            <td>{{$row->capacite}}</td>
                            <td>{{$row->charge}}</td>
                            <td> {{$row->etat}}</td>
                            <td>
                                <a href="{{ route('voiture.car', ['id' => $row->id]) }}"><button class="btn btn-space btn-secondary">Véhicules </button></a>
                            </td>
                            <td>
                                <a href="{{route('vehicule.edit',$row->id)}}"><button class="btn btn-space btn-primary">Modifier</button>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Num</th>
                            <th>Marque</th>
                            <th>Capacité Total</th>
                            <th>Charge</th>
                            <th>Etat</th>
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection