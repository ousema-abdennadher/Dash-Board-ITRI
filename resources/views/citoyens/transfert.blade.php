@extends('layout')
@section('title', 'Transferts')
@section('second_title', 'Transferts')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    @php($i=1)
    @foreach($transferts as $transfert)
    <div class="card">
        <h5 class="card-header text-center text-black">Transfert N°{{$i++}}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Méthode : </label>
                        <span>{{ $transfert->methode }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Point : </label>
                        <span>{{ $transfert->point }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Créé le : </label>
                        <span>{{ \Carbon\Carbon::parse($transfert->created_at)->locale('fr_FR')->isoFormat('LLL') }}</span>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @endforeach
</div>
@endsection