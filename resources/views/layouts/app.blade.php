<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">            
        <div class="wrapper container">
            <div class="container">
                {{-- danger --}}
                @if (Session::has('danger'))
                <div>
                    <div class="session alert alert-danger" role="alert" id="session">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Failed!</strong> {{ Session::get('danger') }}
                    </div>
                </div>
                @endif
                {{-- success --}}
                @if (Session::has('success'))
                <div>
                    <div class="session alert alert-success" role="alert" id="session">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Berjaya!</strong> {{ Session::get('success') }}
                    </div>
                </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="shadown-sm" style="flex-grow: 1">
                            <nav class="navbar navbar-dark bg-dark">
                                <a class="navbar-brand">Simply Note</a>
                                <form class="form-inline">
                                    <a class="nav-link" href="{{ route('home') }}">Login</>
                                        <a class="nav-link" href="{{ route('register.page') }}">Register</a>
                                    </form>
                                </nav>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
