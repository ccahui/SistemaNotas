
<!DOCTYPE html>
<html lang="en">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Sistema Notas</title>
    
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
          <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
          <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
       <!--Import Google Icon Font-->
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Style Materialize -->
     
            
        <!-- Styles -->
        <style>
            
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 300;
            }
          
            .content {
                text-align: center;
            }

            .title {
                font-size: 74px;
                margin-top: 20px;
            }
            .subtitle{
                font-size: 20px;
                font-weight: 500;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .mt{
                margin-top: 100px;
            }
            .mx{
    margin-left: 4rem !important;
    margin-right: 4rem !important;
}

        </style>
    </head>
    <body>
        <div>
            
            <div class="content">
                <div class="title ">
                    Iniciar Sesión
                </div>
            </div>
            
        </div>

            <div class="content subtitle">
                Sistema de notas
            </div>

        <div class="content mt">
        <a href="{{url('/login')}}" class="">
                        <div style="display: inline-block">
                                <i class="material-icons large mx">account_circle</i>
                                <span style="display: block">Alumno</span>
                        </div>
                    
                </a>
            <a href="{{url('/login')}}" >
                        <div style="display: inline-block">
                                <i class="material-icons large mx">people</i>
                                <span style="display: block">Profesor</span>
                        </div>
                </a>
                <a href="{{url('/login')}}">
                        <div style="display: inline-block">
                                <i class="material-icons large mx">supervised_user_circle</i>
                                <span style="display: block">Admin</span>
                        </div>    
                    </a>

        </div>
        
    </body>
</html>
