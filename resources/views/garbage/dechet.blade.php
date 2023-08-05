@extends('layout')
@section('title','Déchets')
@section('second_title','Déchets')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Tableaux des Déchets</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Type</th>
                            <th>Sous Type</th>
                            <th>Objet</th>
                            <th>Poids</th>
                            <th>point par kg</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($data as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->type}}</td>
                            <td>{{$row->sous_type}}</td>
                            <td>{{$row->objet}}</td>
                            <td>{{$row->poids}}</td>
                            <td>{{$row->point_kg}}</td>
                            <td>
                                <a href="{{route('dechet.edit',$row->id)}}"><button class="btn btn-space btn-primary">Modifier</button>
                                </a>
                            </td>
                            <!-- data-toggle="modal" data-target="#exampleModal" -->
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Num</th>
                            <th>Type</th>
                            <th>Sous Type</th>
                            <th>Objet</th>
                            <th>Poids</th>
                            <th>point par kg</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection