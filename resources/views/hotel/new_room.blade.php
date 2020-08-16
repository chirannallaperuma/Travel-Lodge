@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header text-uppercase text-info">Add Room</div>

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
                        <form method="POST" action="{{route('room.save')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="room_no" class="col-md-3 col-form-label text-md-right">Room No.</label>

                                <div class="col-md-7">
                                    <input id="room_no" type="number" min="0"
                                           class="form-control @error('room_no') is-invalid @enderror" name="room_no"
                                           value="{{ old('room_no') }}">

                                    @error('room_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="room_type"
                                       class="col-md-3 col-form-label text-md-right">Room Type</label>

                                <div class="col-md-7">
                                    <select name="room_type" id="room_type"
                                            class="form-control @error('room_type') is-invalid @enderror">
                                        <option value="" selected disabled>Select a Room Type</option>
                                        <option
                                            value="Single: A room assigned to one person. May have one or more beds">
                                            Single: A room assigned to one person. May have one or more
                                            beds
                                        </option>
                                        <option
                                            value="Double: A room assigned to two people. May have one or more beds">
                                            Double: A room assigned to two people. May have one or more
                                            beds
                                        </option>
                                        <option
                                            value="Triple: A room assigned to three people. May have two or more beds">
                                            Triple: A room assigned to three people. May have two or more
                                            beds
                                        </option>
                                        <option
                                            value="Queen: A room with a queen-sized bed. May be occupied by one or more people">
                                            Queen: A room with a queen-sized bed. May be occupied by one or
                                            more people
                                        </option>
                                        <option
                                            value="King: A room with a king-sized bed. May be occupied by one or more people">
                                            King: A room with a king-sized bed. May be occupied by one or
                                            more people
                                        </option>
                                    </select>

                                    @error('room_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price_night"
                                       class="col-md-3 col-form-label text-md-right">Price per Night</label>

                                <div class="col-md-7">
                                    <input id="price_night" type="text" min="0"
                                           class="form-control @error('price_night') is-invalid @enderror"
                                           name="price_night">

                                    @error('price_night')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="max_person"
                                       class="col-md-3 col-form-label text-md-right">Max. person</label>

                                <div class="col-md-7">
                                    <input id="max_person" type="number" min="1"
                                           class="form-control @error('max_person') is-invalid @enderror"
                                           name="max_person">

                                    @error('max_person')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
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
        $('div.alert').delay(2000).slideUp(3000);
    </script>
@endsection
