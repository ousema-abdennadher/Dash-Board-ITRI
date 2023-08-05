@if (session('alert'))
<script>alert('{{ session('alert ') }}');
</script>
@endif
@extends('layout')
@section('title','Livreur')
@section('second_title','Livreur')
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
                            <th>Etat</th>
                            <th>Avis</th>
                            <th>Info</th>
                            <th>Action</th>

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
                            <td>{{$row->etat}}</td>
                            <td>
                                <a href="{{ route('avis.livreur', ['id' => $row->id]) }}"><button class="btn btn-space btn-secondary">Avis
                                        {{ DB::table('Itri_avis_livreur')->where('id_livreur', $row->id)->count() }}</button></a>
                            </td>
                            <td>
                                <a href="{{ route('voiture', ['id' => $row->id]) }}"><button class="btn btn-space btn-success">Véhicules </button></a>
                                <button class="btn btn-space btn-secondary" onclick="showLocations('{{ $row->id }}')">Localisations {{ DB::table('Itri_livreur_location')->where('id_livreur', $row->id)->count() }}</button>
                                <a href="{{ route('conge', ['id' => $row->id]) }}"><button class="btn btn-space btn-success">Conge {{ DB::table('Itri_conge')->where('id_livreur', $row->id)->count() }}</button></a>
                            </td>

                            <td>
                                <a href="{{route('livreur.edit',$row->id)}}"><button class="btn btn-space btn-primary">Modifier</button>
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
                            <th>Etat</th>
                            <th>Avis</th>
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function showLocations(id) {
        // Open the Google Maps URL with the obtained latitude and longitude
        var mapsUrl = "https://www.google.com/maps/place/";
        var lat = 0;
        var long = 0;

        // Example using jQuery AJAX
        $.ajax({
            url: "{{ route('livreur.location', ['id' => ':id']) }}".replace(':id', id),
            method: "GET",
            success: function(response) {
                // Extract the latitude and longitude from the response

                lat = response.latitude;
                long = response.longitude;
                console.log(lat, long);
                // Append the latitude and longitude to the Google Maps URL
                mapsUrl += lat + "," + long;

                // Open the Google Maps URL in a new window
                window.open(mapsUrl, '_blank');

            },
            error: function(xhr, status, error) {
                console.log("Error occurred while fetching location data:", error);
            }
        });

    }
</script>
@endsection
<!-- <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Livreur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ isset($livreur) ? route('livreur.update', $livreur->id) : '' }}" id="form" method="post">
                @csrf
                <div class="modal-body">
                    <div class="card">
                        <h5 class="card-header">Modifier Les cordonnées de livreur</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputLivreurName">Nom</label>
                                <input id="inputLivreurName" type="text" name="nom" value="{{ isset($livreur) ? $livreur->nom : '' }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputLivreurPrenom">Prénom</label>
                                <input id="inputLivreurPrenom" type="text" name="prenom" value="{{ isset($livreur) ? $livreur->prenom : '' }}" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputLivreurMobile">Numéro de téléphone</label>
                                <input id="inputLivreurMobile" type="text" name="tel" value="{{ isset($livreur) ? $livreur->tel : '' }}" pattern="[0-9]{8}" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputLivreurEtat">Etat</label>
                                <select class="form-control" id="inputLivreurEtat" name="etat" class="form-control currency-inputmask">
                                    <option {{ isset($livreur) && $livreur->etat == 'Actif' ? 'selected' : '' }}>Actif</option>
                                    <option {{ isset($livreur) && $livreur->etat == 'InActif' ? 'selected' : '' }}>InActif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-danger">Effacer</button>
                    <button type="submit" class="btn btn-space btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Get the button that opens the modal
    // var openModalBtn = document.querySelector('button[data-target="#exampleModal"]');

    // // Add a click event listener to the button
    // openModalBtn.addEventListener('click', function() {
    //     // Get the input elements in the modal form
    //     var inputName = document.getElementById('inputLivreurName');
    //     var inputPrenom = document.getElementById('inputLivreurPrenom');
    //     var inputMobile = document.getElementById('inputLivreurMobile');
    //     var inputEtat = document.getElementById('inputLivreurEtat');

    //     // Set the values in the input fields
    //     inputName.value = '{{ isset($livreur) ? $livreur->nom : '
    //     ' }}';
    //     inputPrenom.value = '{{ isset($livreur) ? $livreur->prenom : '
    //     ' }}';
    //     inputMobile.value = '{{ isset($livreur) ? $livreur->tel : '
    //     ' }}';
    //     inputEtat.value = '{{ isset($livreur) ? $livreur->etat : '
    //     ' }}';
    // });
</script> -->