@extends('layout')
@section('title', 'Localisation')
@section('second_title', 'Localisations')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    @php($i=1)

    @foreach($locations as $location)
    <div class="card">
        <h5 class="card-header text-center text-black">Localisation N°{{$i++}}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Addresse : </label>
                        <span>{{ $location->adresse }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Region : </label>
                        <span>{{ $location->region }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ville : </label>
                        <span>{{ $location->ville }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Code Postale : </label>
                        <span>{{ $location->code_postal }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button class="btn btn-space btn-primary" onclick="showmap('{{ $location->latitude }}', '{{ $location->longitude }}');">
                            Map
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endforeach
    
    <script type="text/javascript">
        function showmap(lat, long) {
            var cord = {
                lat: lat,
                lng: long
            };

            var mapsUrl = "https://www.google.com/maps/place/" + lat + "," + long;

            // Redirect the user to the Google Maps URL
             window.location.href = mapsUrl;

        }
    </script>
</div>
@endsection