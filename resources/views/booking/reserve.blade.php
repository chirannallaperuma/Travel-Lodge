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

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            height: 100vh;
            margin: 0;
        }


        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

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
                @endguest
            </ul>
        </ul>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">Room Booking</div>

                @if (session('alert'))
                    <div class="alert alert-success">
                        <button type="button"
                                class="close"
                                data-dismiss="alert"
                                aria-hidden="true">
                        </button>
                        {{session('alert')}}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{route('room.reserve')}}">
                        @csrf
                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <div class="form-group row">
                            <label for="check_in" class="col-md-4 col-form-label text-md-right">Check-In</label>

                            <div class="col-md-6">
                                <input id="check_in" type="date"
                                       class="form-control @error('check_in') is-invalid @enderror" name="check_in"
                                       value="{{ old('check_in') }}">

                                @error('check_in')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="check_out" class="col-md-4 col-form-label text-md-right">Check-Out</label>

                            <div class="col-md-6">
                                <input id="check_out" type="date"
                                       class="form-control @error('check_out') is-invalid @enderror" name="check_out"
                                       value="{{ old('check_out') }}">

                                @error('check_out')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <h2 class="text-uppercase">Payment</h2>
                                    <div class="form-group row">
                                        <label for="card_name" class="col-md-4 col-form-label text-md-right">Card
                                            Name</label>

                                        <div class="col-md-6">
                                            <input id="card_name" type="text"
                                                   class="form-control @error('card_name') is-invalid @enderror"
                                                   name="card_name" value="{{ old('card_name') }}">

                                            @error('card_name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="hotel_email" class="col-md-4 col-form-label text-md-right">Card
                                            Number</label>

                                        <div class="col-md-6">
                                            <input id="card_number" type="number"
                                                   class="form-control @error('card_number') is-invalid @enderror"
                                                   name="card_number"
                                                   value="{{ old('card_number') }}">

                                            @error('card_number')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cvv" class="col-md-4 col-form-label text-md-right">CVV</label>

                                        <div class="col-md-6">
                                            <input id="cvv" type="number"
                                                   class="form-control @error('cvv') is-invalid @enderror"
                                                   name="cvv" value="{{ old('cvv') }}">

                                            @error('cvv')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="expiry" class="col-md-4 col-form-label text-md-right">Expiry
                                            Date</label>

                                        <div class="col-md-6">
                                            <input id="expiry" type="date"
                                                   class="form-control @error('expiry') is-invalid @enderror"
                                                   name="expiry" value="{{ old('expiry') }}">

                                            @error('expiry')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="amount"
                                               class="col-md-4 col-form-label text-md-right">Amount</label>

                                        <div class="col-md-6">
                                            <input id="amount" type="number"
                                                   class="form-control @error('amount') is-invalid @enderror"
                                                   name="amount" value="{{ old('amount') }}">

                                            @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Proceed
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $('div.alert').delay(2000).slideUp(1000);
</script>
</body>
</html>
