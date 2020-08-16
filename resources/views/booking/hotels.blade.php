<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Travel Lodge</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <!-- jQuery -->
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('/js/jquery-ui.min.js')}}"></script>
    <script src="{{'/js/bootstrap.bundle.min.js'}}"></script>

</head>
<body>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Logout') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('booking.list') }}">My Bookings</a>
                    </li>
                @endguest
            </ul>
        </ul>
    </nav>

    <div class="row justify-content-center">
        @foreach ($hotels as $hotel)
            <div class="card ml-2 mt-3" style="width:20rem;">
                <img class="card-img-top" src="{{$hotel->img_url}}" height="220">
                <div class="card-body">
                    <h5 class="card-title">{{$hotel->hotel_name}}</h5>
                    <p class="card-text">{{\Illuminate\Support\Str::limit($hotel->description, 60)}}</p>
                    <h6 class="card-text">Facilities</h6>

                    <div>
                        @if ($hotel->ac == 1)
                            <span>AC,</span>
                        @endif
                        @if ($hotel->pool == 1)
                            <span>Pool,</span>
                        @endif
                        @if ($hotel->wifi == 1)
                            <span>Wifi,</span>
                        @endif
                        @if ($hotel->gym == 1)
                            <span>Gym</span>
                        @endif
                    </div>
                    <br>
                    <a href="{{route('booking.new',[$hotel->id,$check_in,$check_out])}}" class="btn btn-primary"
                       target="_blank">RESERVE</a>
                </div>
            </div>
        @endforeach
    </div>
    {{$hotels->links()}}

</div>

</body>
</html>
