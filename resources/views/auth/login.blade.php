<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>i'Tri - Connecter</title>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('uploads/IMG_8083.JPG') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center">

                <img src="{{ asset('uploads/i-tri.png') }}" width="50%" height="50%" alt="">
                <span class="splash-description">Veuillez entrer vos informations.</span>
            </div>
            <div class="card-body">

                <form action="{{ route('login.action') }}" id="form" data-parsley-validate="" method="post">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $errors->first('admin_username') }}</li>
                            <li>{{ $errors->first('admin_password') }}</li>
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="admin_username" data-parsley-trigger="change" placeholder="Nom" autocomplete="off">

                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control form-control-lg" id="pass1" type="password" placeholder="Mot de Passe" name="admin_password">
                            <div class="input-group-prepend">
                                <div class="input-group-text" style="cursor: pointer;" id="eyeicon">
                                    <i class="fas fa-thin fa-eye-slash"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Connecter</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0">
                <div class="card-footer-item card-footer-item-bordered">
                    <p> Pas de compte ! <a href="{{ route('register')}}" class="footer-link">Créer un compte</a></p>
                </div>
                <ul>

                </ul>

            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/parsley.js') }}"></script>
    <script>
        let eyeicon = document.getElementById('eyeicon');
        let pass1 = document.getElementById('pass1');
        eyeicon.onclick = function() {
            if (pass1.type == "password") {
                pass1.type = "text";
                eyeicon.innerHTML = '<i class="fas fa-regular fa-eye"></i>';
            } else {
                pass1.type = "password";
                eyeicon.innerHTML = '<i class="fas fa-thin fa-eye-slash"></i>'
            }
        };
        $('#form').parsley();
    </script>
</body>

</html>