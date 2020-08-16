@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header text-uppercase text-info">Edit Hotel</div>

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
                        <form method="POST" action="{{route('hotel.update')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">Hotel
                                    Description</label>

                                <div class="col-md-7">
                                    <textarea name="description" id="description" cols="30" rows="5"
                                              class="form-control @error('description') is-invalid @enderror"
                                              name="description">{{$hotel->description}}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="facility"
                                       class="col-md-3 col-form-label text-md-right">Facilities</label>

                                <div class="col-md-1">
                                    <div class="form-check form-check-inline">
                                        <input name="ac" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            {{$hotel->ac == 1?'checked':''}}>
                                        <label class="form-check-label" for="inlineCheckbox1">AC</label>
                                    </div>

                                    @error('ac')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-1">
                                    <div class="form-check form-check-inline">
                                        <input name="pool" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            {{$hotel->pool == 1?'checked':''}}>
                                        <label class="form-check-label" for="inlineCheckbox1">Pool</label>
                                    </div>

                                    @error('pool')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-1">
                                    <div class="form-check form-check-inline">
                                        <input name="wifi" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            {{$hotel->wifi == 1?'checked':''}}>
                                        <label class="form-check-label" for="inlineCheckbox1">Wifi</label>
                                    </div>

                                    @error('wifi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-1">
                                    <div class="form-check form-check-inline">
                                        <input name="gym" class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            {{$hotel->gym == 1?'checked':''}}>
                                        <label class="form-check-label" for="inlineCheckbox1">Gym</label>
                                    </div>

                                    @error('gym')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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
@endsection
