@extends('layout')
@section('title')
    @if (isset($livreur))
       Modifier un Livreur
    @else
        Ajouter un Livreur
    @endif
@endsection

@section('second_title')
    @if (isset($livreur))
        Modifier un Livreur
    @else
        Ajouter un Livreur
    @endif
@endsection 
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        @if (isset($livreur))
        <h5 class="card-header">Modifier un Livreur</h5>
        @else
        <h5 class="card-header">Ajouter un Livreur</h5>
        @endif
        <div class="card-body">
            <form action="{{ isset($livreur) ? route('livreur.update', $livreur->id) : route('livreur.add') }}" id="form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputLivreurName">Nom</label>
                    <input id="inputLivreurName" type="text" name="nom" required="" placeholder="Nom du livreur" value="{{ isset($livreur) ? $livreur->nom : ''}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputLivreurPrenom">Prénom</label>
                    <input id="inputLivreurPrenom" type="text" name="prenom" required="" placeholder="Prénom du livreur" value="{{ isset($livreur) ? $livreur->prenom : ''}}" class=form-control currency-inputmask">
                </div>
                <div class="form-group">
                    <label for="inputLivreurMobile">Numéro de téléphone</label>
                    <input id="inputLivreurMobile" type="text" name="tel" required="" placeholder="Numéro de téléphone" pattern="[0-9]{8}" value="{{ isset($livreur) ? $livreur->tel : '' }}" class="form-control currency-inputmask">
                </div>
                <div class="form-group">
                    <label for="inputLivreurEmail">Email</label>
                    <input id="inputLivreurEmail" type="email" name="email" required="" placeholder="E-mail" value="{{ isset($livreur) ? $livreur->email : '' }}" class="form-control currency-inputmask">
                </div>
                <div class="form-group">
                    <label for="inputLivreurPassword">Mot de passe</label>
                    <input id="inputLivreurPassword" type="password" name="password" required="" placeholder="Mot de passe" value="{{ isset($livreur) ? $livreur->password : '' }}" class="form-control currency-inputmask">
                </div>
                <div class="form-group">
                    <label for="inputLivreurEtat">Etat</label>
                    <select class="form-control" id="inputLivreurEtat" name="etat" required="" placeholder="Etat" class="form-control currency-inputmask">
                        <option {{ isset($livreur) && $livreur->etat == 'Actif' ? 'selected' : '' }}>Actif</option>
                        <option {{ isset($livreur) && $livreur->etat == 'InActif' ? 'selected' : '' }}>InActif</option>
                    </select>
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