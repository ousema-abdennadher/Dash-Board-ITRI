@extends('layout')
@section('title')
    @if (isset($vehicule))
        Modifier une Véhicule
    @else
        Ajouter une Véhicule
    @endif
@endsection

@section('second_title')
    @if (isset($vehicule))
        Modifier une Véhicule
    @else
        Ajouter une Véhicule
    @endif
@endsection

@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        @if (isset($vehicule))
        <h5 class="card-header">Modifier une Véhicule</h5>
        @else
        <h5 class="card-header">Ajouter une Véhicule</h5>
        @endif
        <div class="card-body">
            <form action="{{ isset($vehicule) ? route('vehicule.update', $vehicule->id) : route('vehicule.add') }}" id="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputVehiculeMarque">Marque</label>
                    <input id="inputVehiculeMarque" type="text" name="mark" required="" placeholder="Marque de la véhicule" value="{{ isset($vehicule) ? $vehicule->mark : ''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputVehiculeCapacite">Capacite</label>
                    <input id="inputVehiculeCapacite" type="number" step="0.01" name="capacite" required="" placeholder="Charge Maximal de la véhicule en Kg " value="{{ isset($vehicule) ? $vehicule->capacite : ''}}" class=form-control currency-inputmask">
                </div>
                <div class="form-group">
                    <label for="inputVehiculeCharge">Charge</label>
                    <input id="inputVehiculeCharge" type="number" step="0.01" name="charge" required="" placeholder="Charge en Kg" value="{{ isset($vehicule) ? $vehicule->charge : '' }}" class="form-control currency-inputmask">
                </div>
                <div class="form-group">
                    <label for="inputVehiculeEtat">Etat</label>
                    <input id="inputVehiculeEtat" type="text" name="etat" required="" placeholder="Etat de la véhicule" value="{{ isset($vehicule) ? $vehicule->etat : ''}}" class=form-control currency-inputmask">
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