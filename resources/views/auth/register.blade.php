<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>i'Tri - Admin Sign Up</title>
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
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->

    <form action="{{ route('register.save') }}" id="form" class="splash-container" data-parsley-validate="" method="post">
        @csrf
        @method('post')
        <div class="card">
            <div class="card-header text-center">
                <h3 class="mb-1 ">Inscription</h3>
                <p>Veuillez entrer vos informations.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg @error('name')is-invalid @enderror" type="text" name="admin_username" data-parsley-trigger="change" required="" placeholder="Nom d'utilisateur" autocomplete="off">
                    <!-- @error('admin_username')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror -->
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg @error('email')is-invalid @enderror" type="email" name="admin_email" data-parsley-trigger="change" required="" placeholder="E-mail" autocomplete="off">
                    @error('admin_email')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control form-control-lg @error('password')is-invalid @enderror" id="pass1" type="password" required="" placeholder="Mot de Passse" name="admin_password">
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="cursor: pointer;" id="eyeicon">
                                <i class="fas fa-thin fa-eye-slash"></i>
                            </div>
                        </div>
                        @error('admin_password')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control form-control-lg @error('password_confirmation')is-invalid @enderror" data-parsley-equalto="#pass1" type="password" required="" name="admin_password_confirmation" placeholder="Confirmer Mot de Passe" id="pass2">
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="cursor: pointer;" id="eyeicon2">
                                <i class="fas fa-thin fa-eye-slash"></i>
                            </div>
                        </div>
                        @error('admin_password_confirmation')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">S'Inscrire</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Déjà membre ? <a href="{{ route('login') }}" class="text-secondary">Connectez-vous.</a></p>
            </div>
        </div>
    </form>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/parsley.js') }}"></script>
    <script src="{{ asset('js/main-js.js') }}"></script>
    <script>
        let eyeicon = document.getElementById('eyeicon');
        let eyeicon2 = document.getElementById('eyeicon2');
        let pass1 = document.getElementById('pass1');
        let pass2 = document.getElementById('pass2');
        eyeicon.onclick = function() {
            if (pass1.type == "password") {
                pass1.type = "text";
                eyeicon.innerHTML = '<i class="fas fa-regular fa-eye"></i>';
            } else {
                pass1.type = "password";
                eyeicon.innerHTML = '<i class="fas fa-thin fa-eye-slash"></i>'
            }
        };
        eyeicon2.onclick = function() {
            if (pass2.type == "password") {
                pass2.type = "text";
                eyeicon2.innerHTML = '<i class="fas fa-regular fa-eye"></i>';
            } else {
                pass2.type = "password";
                eyeicon2.innerHTML = '<i class="fas fa-thin fa-eye-slash"></i>'
            }
        };
        $('#form').parsley();
    </script>
</body>

</html>