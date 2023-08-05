@if (session('alert'))
<script>
    alert('{{ session('alert') }}');
</script>
@endif

@extends('layout')
@section('title','Citoyen')
@section('second_title','Citoyen')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Tableaux des Livreurs</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Nom et Prénom</th>
                            <th>Numéro de téléphone</th>
                            <th>E-mail</th>
                            <th>Transferts</th>
                            <th>Locations</th>
                            <th>Avis</th>
                            <th>Messages</th>


                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($data as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->nom}} {{$row->prenom}}</td>

                            <td>{{$row->tel}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                                <a href="{{route('transfert',['id'=>$row->id]) }}"><button class="btn btn-space btn-secondary">Transferts
                                        {{ DB::table('itri_transfert')->where('id_client', $row->id)->count() }}
                                    </button></a>
                            </td>
                            <td>
                                <a href="{{route('location',['id'=>$row->id]) }}"><button class="btn btn-space btn-success">Localisations
                                        {{ DB::table('itri_citoyen_location')->where('id_citoyen', $row->id)->count() }}
                                    </button></a>
                            </td>

                            <td>
                                <a href="{{ route('avis.citoyen', ['id' => $row->id]) }}"><button class="btn btn-space btn-secondary">Avis
                                        {{ DB::table('itri_avis_citoyen')->where('id_citoyen', $row->id)->count() }}
                                    </button></a>
                            </td>

                            <td>
                                <a href="{{ route('message', ['id' => $row->id]) }}">
                                    <button class="btn btn-space btn-primary">
                                        Messages {{ DB::table('itri_message')->where('id_citoyen', $row->id)->count() }}
                                    </button>
                                </a>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>Num</th>
                            <th>Nom et Prénom</th>
                            <th>Numéro de téléphone</th>
                            <th>E-mail</th>
                            <th>Transferts</th>
                            <th>Locations</th>
                            <th>Avis</th>
                            <th>Messages</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection