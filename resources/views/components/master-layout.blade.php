{{--

/**
*
* Created a new component <x-base-layout/>.
* 
*/

--}}

@php

$isBoxed=0;
$isAltMenu=0;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ isset($pageTitle)?$pageTitle:"New Page"}}</title>
    <link rel="icon" type="image/x-icon" href="{{Vite::asset('resources/images/favicon.png')}}" />
    <script src="{{asset('plugins/jquery/jquery-3.6.1.min.js')}}"></script>
    @vite(['resources/sass/app.scss','resources/js/app.js'])

    {{-- @vite(['resources/scss/layouts/vertical-light-menu/light/loader.scss'])
    @vite(['resources/layouts/vertical-light-menu/loader.js']) --}}

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/bootstrap.min.css')}}">

    @vite(['resources/scss/light/assets/main.scss', 'resources/scss/dark/assets/main.scss'])

    @if (
    !Request::routeIs('404') &&
    !Request::routeIs('maintenance') &&
    !Request::routeIs('signin') &&
    !Request::routeIs('signup') &&
    !Request::routeIs('lockscreen') &&
    !Request::routeIs('password-reset') &&
    !Request::routeIs('2Step') &&

    // Real Logins and Register
    !Request::routeIs('login') &&
    !Request::routeIs('register')
    )
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/waves/waves.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/highlight/styles/monokai-sublime.css')}}">
    @vite([
    'resources/scss/light/plugins/perfect-scrollbar/perfect-scrollbar.scss',
    'resources/scss/layouts/vertical-light-menu/light/structure.scss',
    'resources/scss/layouts/vertical-light-menu/dark/structure.scss',
    ])

    @endif
    <link rel="stylesheet" href="{{asset('plugins/main.css')}}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{$headerFiles}}
    <!-- END GLOBAL MANDATORY STYLES -->
</head>

<body @class([ // 'layout-dark'=> $isDark,
    'layout-boxed' => $isBoxed,
    'alt-menu' => ($isAltMenu || Request::routeIs('collapsibleMenu') ? true : false),
    'error' => (Request::routeIs('404') ? true : false),
    'maintanence' => (Request::routeIs('maintenance') ? true : false),
    ])
    
    {{--

    /*
    *
    *   Check if the routes are not single pages ( which does not contains sidebar or topbar  ) such as :-
    *   - 404
    *   - maintenance
    *   - authentication
    *
    */

    --}}

    @if (
    !Request::routeIs('404') &&
    !Request::routeIs('maintenance') &&
    !Request::routeIs('signin') &&
    !Request::routeIs('signup') &&
    !Request::routeIs('lockscreen') &&
    !Request::routeIs('password-reset') &&
    !Request::routeIs('2Step') &&

    // Real Logins
    !Request::routeIs('login') &&
    !Request::routeIs('register')
    )

    @if (!Request::routeIs('blank'))
    <!--  BEGIN NAVBAR  -->
    <x-navbar.style-vertical-menu classes="{{($isBoxed ? 'container-xxl' : '')}}" />
    <!--  END NAVBAR  -->
    @endif

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <!--  BEGIN LOADER  -->
        <x-layout-overlay />
        <!--  END LOADER  -->

        @if (!Request::routeIs('blank'))
        <!--  BEGIN SIDEBAR  -->
        <x-menu.vertical-menu />
        <!--  END SIDEBAR  -->
        @endif

        <!--  BEGIN CONTENT AREA  -->
        {{-- {{(Request::routeIs('blank') ? 'ms-0 mt-0' : '')}} --}}
        <div id="content" class="main-content">

            <div class="layout-px-spacing">
                <div class="middle-content {{($isBoxed ? 'container-xxl' : '')}} p-0">

                    {{ $slot }}
                </div>
            </div>

            <!--  BEGIN FOOTER  -->
            <x-layout-footer />
            <!--  END FOOTER  -->

        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!--  END MAIN CONTAINER  -->

    @else
    {{ $slot }}
    @endif
    @if (
    !Request::routeIs('404') &&
    !Request::routeIs('maintenance') &&
    !Request::routeIs('lockscreen') &&
    !Request::routeIs('password-reset') &&
    !Request::routeIs('2Step') &&

    // Real Logins & Real Register
    !Request::routeIs('login') &&
    !Request::routeIs('register')
    )
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="{{asset('plugins/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('plugins/mousetrap/mousetrap.min.js')}}"></script>
    <script src="{{asset('plugins/waves/waves.min.js')}}"></script>
    <script src="{{asset('plugins/highlight/highlight.pack.js')}}"></script>


    @vite(['resources/layouts/vertical-light-menu/app.js'])
    <script src="{{asset('plugins/main.js')}}"></script>
    <!-- END GLOBAL MANDATORY STYLES -->

    @endif
    {{$footerFiles}}
</body>

</html>