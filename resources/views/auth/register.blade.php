@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-uppercase text-info">Hotel Register</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user" value="hotel">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Owner Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Owner Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="hotel_name" class="col-md-4 col-form-label text-md-right">Hotel
                                                Name</label>

                                            <div class="col-md-6">
                                                <input id="hotel_name" type="text"
                                                       class="form-control @error('hotel_name') is-invalid @enderror"
                                                       name="hotel_name" value="{{ old('hotel_name') }}">

                                                @error('hotel_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="hotel_email" class="col-md-4 col-form-label text-md-right">Hotel
                                                Email</label>

                                            <div class="col-md-6">
                                                <input id="hotel_email" type="text"
                                                       class="form-control @error('hotel_email') is-invalid @enderror"
                                                       name="hotel_email"
                                                       value="{{ old('hotel_email') }}">

                                                @error('hotel_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="description" class="col-md-4 col-form-label text-md-right">Hotel
                                                Description</label>

                                            <div class="col-md-6">
                                                <input id="description" type="text"
                                                       class="form-control @error('description') is-invalid @enderror"
                                                       name="description" value="{{ old('description') }}">

                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                                            <div class="col-md-6">
                                                <input id="city" type="text"
                                                       class="form-control @error('city') is-invalid @enderror"
                                                       name="city" value="{{ old('city') }}">

                                                @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="address"
                                                   class="col-md-4 col-form-label text-md-right">Address</label>

                                            <div class="col-md-6">
                                                <input id="address" type="text"
                                                       class="form-control @error('address') is-invalid @enderror"
                                                       name="address" value="{{ old('address') }}">

                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="hotel_name" class="col-md-4 col-form-label text-md-right">Contact
                                                Number</label>

                                            <div class="col-md-6">
                                                <input id="contact" type="number"
                                                       class="form-control @error('contact') is-invalid @enderror"
                                                       name="contact" value="{{ old('contact') }}">

                                                @error('contact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="hotel_rooms" class="col-md-4 col-form-label text-md-right">Maximum
                                                No. of
                                                Rooms</label>

                                            <div class="col-md-6">
                                                <input id="hotel_rooms" type="number" min="1" max="30"
                                                       class="form-control @error('hotel_rooms') is-invalid @enderror"
                                                       name="hotel_rooms" value="{{ old('hotel_rooms') }}">

                                                @error('hotel_rooms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="facility"
                                                   class="col-md-4 col-form-label text-md-right">Facilities</label>
                                            <div class="col-md-6">
                                                <div class="form-check form-check-inline">
                                                    <input name="ac" class="form-check-input" type="checkbox"
                                                           id="inlineCheckbox1"
                                                           value="ac">
                                                    <label class="form-check-label" for="inlineCheckbox1">AC</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input name="pool" class="form-check-input" type="checkbox"
                                                           id="inlineCheckbox2"
                                                           value="pool">
                                                    <label class="form-check-label" for="inlineCheckbox2">Pool</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input name="wifi" class="form-check-input" type="checkbox"
                                                           id="inlineCheckbox2"
                                                           value="wifi">
                                                    <label class="form-check-label" for="inlineCheckbox2">Wifi</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input name="gym" class="form-check-input" type="checkbox"
                                                           id="inlineCheckbox2"
                                                           value="gym">
                                                    <label class="form-check-label" for="inlineCheckbox2">Gym</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <div class="form-group" style="padding-top: 20px">
                                            <img id="image" class="img-thumbnail" width="200"
                                                 src="{{ asset('img/no_image.jpg') }}"
                                                 alt="hotel_image"/>
                                            <p>choose image</p>
                                            <input type="file" name="image" id="itempic">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
