<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Corridas</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}" onclick="">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('journeys.index') }}">Corridas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('drivers.index') }}">Motoristas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('passengers.index') }}">Passageiros</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
<script src="{{ asset('js/utils.js') }}"></script>
</body>
</html>
