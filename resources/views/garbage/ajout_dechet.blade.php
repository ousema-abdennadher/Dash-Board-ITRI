@extends('layout')
@section('title')
@if (isset($dechet))
Modifier un Dechet
@else
Ajouter un Dechet
@endif
@endsection

@section('second_title')
@if (isset($dechet))
Modifier un Dechet
@else
Ajouter un Dechet
@endif
@endsection
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        @if (isset($dechet))
        <h5 class="card-header">Modifier un Dechet</h5>
        @else
        <h5 class="card-header">Ajouter un Dechet</h5>
        @endif
        <div class="card-body">
            <form action="{{ isset($dechet) ? route('dechet.update', $dechet->id) : route('dechet.add') }}" id="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputDechetType">Type de Déchet</label>
                    <input id="inputDechetType" type="text" name="type" required="" placeholder="Type de déchet" value="{{ isset($dechet) ? $dechet->type : ''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputDechetSousType">Sous Type de Déchet</label>
                    <input id="inputDechetSousType" type="text" name="sous_type" required="" placeholder="Sous_Type de déchet" value="{{ isset($dechet) ? $dechet->sous_type : ''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputDechetObjet">Objet de Déchet</label>
                    <input id="inputDechetObjet" type="text" name="objet" required="" placeholder="Objet de déchet" value="{{ isset($dechet) ? $dechet->objet : ''}}" class=form-control currency-inputmask">
                </div>
                <div class="form-group">
                    <label for="inputDechetType">Poids de Déchet</label>
                    <input id="inputDechetType" type="number" step="0.001" name="poids" required="" placeholder="Poids de déchet " value="{{ isset($dechet) ? $dechet->poids : ''}}" class=form-control currency-inputmask">
                </div>
                <div class="form-group">
                    <label for="inputDechetType">Points par Kg</label>
                    <input id="inputDechetType" type="number" step="0.001" name="point_kg" required="" placeholder="Points de déchet par Kg" value="{{ isset($dechet) ? $dechet->point_kg : '' }}" class="form-control currency-inputmask">
                </div>



                <div class="row">
                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                    </div>
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                            <button type="submit" class="btn btn-space btn-primary">Ajouter</button>
                            <button type="reset" class="btn btn-outline-danger">Effacer</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection