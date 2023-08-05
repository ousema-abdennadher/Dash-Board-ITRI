@extends('layout')
@section('title', 'Congé')
@section('second_title', 'Congé')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    @php($i=1)

    @foreach($conges as $conge)
    <div class="card">
        <h5 class="card-header text-center text-black">Congé N°{{$i++}} </h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Cause de Conge : </label>
                        <span>{{ $conge->cause }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>La Date de Demande de Congé : </label>
                        <span>{{ \Carbon\Carbon::parse($conge->date_conge)->locale('fr_FR')->isoFormat('LL') }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Durée de Congé : </label>
                        <span>{{ $conge->nb_jours }}</span>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label>Créé le : </label>
                        <span>{{ \Carbon\Carbon::parse($conge->created_at)->locale('fr_FR')->isoFormat('LLL') }}</span>
                    </div>
                </div> -->
            </div>

        </div>
    </div>

    @endforeach
</div>
@endsection