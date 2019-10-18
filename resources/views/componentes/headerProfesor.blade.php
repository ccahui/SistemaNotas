<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') - Sistema Notas</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <style>
  
    </style>

    </head>
<body>

                <div class="navbar-fixed">
                <nav class="nav-wrapper indigo">
                  <div class="container">
                    <a href="{{url('/')}}" class="brand-logo">Sistema Notas</a>
                    <a href="#" class="sidenav-trigger" data-target="mobile-links">
                      <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                    <li><a href="{{url('/notas/profesor/1')}}">Mis Cursos</a></li>
                      
                      @auth
                    <li><a class="dropdown-trigger btn white indigo-text" href="#!" data-target="dropdown1">{{Auth::user()->email}}<i class="material-icons right">arrow_drop_down</i></a></li>
                  
                      <!-- Dropdown Structure -->
                        <ul id="dropdown1" class="dropdown-content">
                        <li><a href="{{url('/logout')}}" class="indigo-text">Cerrar Sesión</a></li>
                      </ul>    
                      @endauth
                      
                  
                    </ul>
                  </div>
                </nav>
              </div>
            
              <ul class="sidenav" id="mobile-links">
                <li><a href="/profesores">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="" class="indigo-text">Login</a></li>
              </ul>


  