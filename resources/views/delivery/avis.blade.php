@extends('layout')
@section('title', 'Avis')
@section('second_title', 'Avis')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    @php($i=1)

    @foreach($avis as $avi)
    <div class="card">
        <h5 class="card-header text-center text-black">Avis N°{{$i++}} a propos le citoyen : {{$avi->citoyen->nom}} {{$avi->citoyen->prenom }}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Evaluation : </label>
                        <span>{{ $avi->rating }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description: </label>
                        <span>{{ $avi->description }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sujet : </label>
                        <span>{{ $avi->subject }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Créé le : </label>
                        <span>{{ \Carbon\Carbon::parse($avi->date)->locale('fr_FR')->isoFormat('LLL') }}</span>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @endforeach
</div>
@endsection