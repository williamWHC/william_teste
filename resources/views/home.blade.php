@extends('layout')
<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
        overflow: hidden;
    }

    .full-height {
        height: 80vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 50px;
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

    .m-b-md {
        margin-bottom: 30px;
    }
</style>

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Corridas compartilhadas
            </div>

            <div class="links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('journeys.index') }}">Corridas</a>
                <a href="{{ route('drivers.index') }}">Motoristas</a>
                <a href="{{ route('passengers.index') }}">Passageiros</a>
            </div>
        </div>
    </div>
@endsection