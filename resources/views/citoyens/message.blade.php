@extends('layout')
@section('title', 'Messages')
@section('second_title', 'Messages')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    @php($i=1)
    @foreach($messages as $message)
    <div class="card">
        <h5 class="card-header text-center text-black">Message N°{{$i++}}</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Titre de message : </label>
                        <span>{{ $message->titre }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description: </label>
                        <span>{{ $message->description }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Créé le : </label>
                        <span>{{ \Carbon\Carbon::parse($message->date)->locale('fr_FR')->isoFormat('LLL') }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endforeach
</div>
@endsection