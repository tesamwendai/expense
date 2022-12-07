<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>404 Error</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico"/>
    @vite('resources/scss/layouts/vertical-light-menu/light/loader.scss')
    {{-- <link href="{{Vite::asset('resources/scss/layouts/vertical-light-menu/light/loader.scss')}}" rel="stylesheet" type="text/css" /> --}}
    @vite(['resources/layouts/vertical-light-menu/loader.js'])
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/bootstrap.min.css')}}">

    {{-- <link href="/layouts/vertical-light-menu/css/light/plugins.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{Vite::asset('resources/scss/light/assets/pages/error/error.scss')}}" rel="stylesheet" type="text/css" />

    {{-- <link href="/layouts/vertical-light-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{Vite::asset('resources/scss/dark/assets/pages/error/error.scss')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <style>
        body.dark .theme-logo.dark-element {
            display: inline-block;
        }
        .theme-logo.dark-element {
            display: none;
        }
        body.dark .theme-logo.light-element {
            display: none;
        }
        .theme-logo.light-element {
            display: inline-block;
        }
    </style>
    
</head>
<body class="error text-center">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mr-auto mt-5 text-md-left text-center">
                <a href="{{route('home')}}" class="ml-md-5">
                    <img alt="image-404" src="{{Vite::asset('resources/images/favicon.png')}}" class="dark-element theme-logo">
                    <img alt="image-404" src="{{Vite::asset('resources/images/favicon.png')}}" class="light-element theme-logo">
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid error-content">
        <div class="">
            <h1 class="error-number">404</h1>
            <p class="mini-text">Ooops!</p>
            <p class="error-text mb-5 mt-1">The page you requested was not found!</p>
            <img src="{{Vite::asset('resources/images/error.svg')}}" alt="cork-admin-404" class="error-img">
            <a href="{{URL::previous()}}" class="btn btn-dark mt-5">Go Back</a>
        </div>
    </div>    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('plugins/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>