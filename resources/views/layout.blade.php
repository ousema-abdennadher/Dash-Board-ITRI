 <!doctype html>
 <html lang="en">


 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>i'Tri - @yield('title')</title>
     <!-- Bootstrap CSS -->

     <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
     <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
     <link href="{{ url('fonts/circular-std/style.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{ url('css/style.css') }}">
     <link rel="stylesheet" href="{{ url('css/dataTables.bootstrap4.css') }}">
     <link rel="stylesheet" href="{{ url('css/inputmask.css') }}">
     <link rel="stylesheet" href="{{ url('fonts/fontawesome/css/fontawesome-all.css') }}">
 </head>

 <body>
     <!-- ============================================================== -->
     <!-- main wrapper -->
     <!-- ============================================================== -->
     <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
         <!-- navbar -->
         <!-- ============================================================== -->
         <div class="dashboard-header">
             <nav class="navbar navbar-expand bg-white fixed-top">
                 <a class="navbar-brand" href="{{ route('dashboard') }}"><img src="{{ asset('uploads/i-tri.png') }}"" width=" 30%" height="30%" alt=""></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span><i class="fas fa-bars mx-3"></i></span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-right-top">
                         <li class="nav-item dropdown nav-user">
                             <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-2"></i></a>
                             <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                 <div class="nav-user-info">
                                     <h5 class="mb-0 text-white nav-user-name">
                                         @if(auth()->check())
                                         <span>{{ auth()->user()->admin_username }}</span>
                                         @endif
                                     </h5>

                                 </div>
                                 <a class="dropdown-item" href="{{route('admin')}}"><i class="fas fa-user mr-2"></i>Compte</a>
                                 <a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-power-off mr-2"></i>Déconnecter</a>
                             </div>
                         </li>
                     </ul>
                 </div>
             </nav>
         </div>
         <!-- ============================================================== -->
         <!-- end navbar -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- left sidebar -->
         <!-- ============================================================== -->
         <div class="nav-left-sidebar sidebar-dark">
             <div class="menu-list">
                 <nav class="navbar navbar-expand-lg navbar-light">
                     <a class="d-xl-none d-lg-none" href="#">Menu</a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarNav">
                         <ul class="navbar-nav flex-column">
                             <li class="nav-divider">
                                 Menu
                             </li>
                             <li class="nav-item ">
                                 <a class="nav-link active" href="{{ route('dashboard') }}"><i class="fas fa-chart-line"></i> Tableau de Bord</a>
                             </li>
                             <hr id="hr">
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('citoyen') }}"><i class="fa fa-fw fa-user-circle"></i> Citoyen</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('request') }}"><i class="fas fa-shopping-cart"></i> Demandes</a>
                             </li>
                             <hr id="hr">
                             <li class="nav-item ">
                                 <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-solid fa-truck"></i> Livreurs</a>
                                 <div id="submenu-4" class="collapse submenu" style="">
                                     <ul class="nav flex-column">
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('livreur') }}">Voir Les Livreurs</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{route('addlivreur')}}">Ajouter un livreur</a>
                                         </li>
                                     </ul>
                                 </div>
                             </li>

                             <li class="nav-item ">
                                 <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-4"><i class="fa fa-solid fa-car"></i> Véhicules</a>
                                 <div id="submenu-5" class="collapse submenu" style="">
                                     <ul class="nav flex-column">
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('vehicule') }}">Voir Les Véhicules</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{route('addvehicule')}}">Ajouter un Véhicule</a>
                                         </li>
                                     </ul>
                                 </div>
                             </li>
                             <li class="nav-item ">
                                 <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-4"><i class="fas fa-solid fa-trash"></i> Déchets</a>
                                 <div id="submenu-6" class="collapse submenu" style="">
                                     <ul class="nav flex-column">
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{ route('dechet') }}">Voir Les Déchets</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" href="{{route('ajout_dechet')}}">Ajouter un Déchets</a>
                                         </li>
                                     </ul>
                                 </div>
                             </li>

                         </ul>
                     </div>
                 </nav>
             </div>
         </div>
         <!-- ============================================================== -->
         <!-- end left sidebar -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- wrapper  -->
         <!-- ============================================================== -->
         <div class="dashboard-wrapper">
             <div class="container-fluid dashboard-content">
                 <!-- ============================================================== -->
                 <!-- pageheader -->
                 <!-- ============================================================== -->
                 <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                         <div class="page-header">
                             <h2 class="pageheader-title">@yield('title')</h2>
                             <div class="page-breadcrumb">
                                 <nav aria-label="breadcrumb">
                                     <ol class="breadcrumb">
                                         <li class="breadcrumb-item"><a href="/dashboard" class="breadcrumb-link">Dashboard</a></li>
                                         <li class="breadcrumb-item active" aria-current="page">@yield('second_title')</li>
                                     </ol>
                                 </nav>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- ============================================================== -->
                 <!-- end pageheader -->
                 <!-- ============================================================== -->
                 <div class="row">
                     @yield('content')

                 </div>



             </div>
         </div>
     </div>


     <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
     <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
     <script src="{{ asset('js/main-js.js') }}"></script>
     <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
     <script src="{{ asset('js/data-table.js') }}"></script>
     <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('js/jquery.inputmask.bundle.js') }}"></script>

 </body>

 </html>