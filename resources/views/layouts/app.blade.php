<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Qwerty') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <div class="container container-main">
                <div class="row text-center">
                    <div class="col-md-4">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="{{ asset('images/logo.png') }}" height="100px" />
                        </a>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        <form action="{{url('search')}}">
                            <div class="input-group">
                                    <input type="text" class="form-control" name="searchData" placeholder="Zoek in producten"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            Zoek
                                        </button>
                                    </span>
                            </div>
                        </form>
                    </div>
                </div>
                @include('layouts.navigation')

                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif

                @if(Session::has('error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('error') }}</p>
                @endif

                @if(Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
                @endif

                <div class="content bg-lighter">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
