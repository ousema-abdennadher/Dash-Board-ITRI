@extends('layout')
@section('title','Adminsitrateur')
@section('second_title','Adminsitrateur')
@section('content')

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <form id="form" class="splash-container" method="post" action="{{ route('admin.update')}}">
        @csrf
        @method('PUT')
        <div class="card ">
            <div class="card-header  text-center"><i class="fas fa-wrench fa-lg" style="color: #aaf706;"></i></div>

            <div class="card-body">
                <div class="form-group">
                    <h3 class="card-title text-black text-center">Modification</h3>
                </div>
                <div class="form-group">
                    <i class="fas fa-solid fa-user"> </i> <label for="">Nom</label>
                    <input class="form-control form-control-lg" type="text" name="admin_username" required autocomplete="off" value="{{ session('admin_username', $admin->admin_username ?? '') }}">
                </div>
                <div class="form-group">
                    <i class="fas fa-solid fa-envelope"></i> <label for="">E-mail</label>
                    <input class="form-control form-control-lg" type="email" name="admin_email" required autocomplete="off" value="{{ session('admin_email', $admin->admin_email ?? '') }}">
                </div>

                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Modifier</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Tableaux des Adminsitrateurs</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Mot de passe</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id}}</td>
                            <td>{{ $admin->admin_username}}</td>
                            <td>{{ $admin->admin_email}}</td>
                            <td>{{ $admin->admin_password }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Mot de passe</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection