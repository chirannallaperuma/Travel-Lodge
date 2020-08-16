@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header text-uppercase text-info">Booking List</div>

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
                        <table class="table table-bordered table-responsive-lg">
                            <thead class="bg-gradient-navy">
                            <tr>
                                <th>Room No</th>
                                <th>Customer Name</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                            </tr>
                            </thead>
                            @foreach ($hotel->rooms as $booking)
                                @foreach ($booking->bookings as $data)
                                    <tr>
                                        <td>{{$data->rooms->room_no}}</td>
                                        <td>{{$data->user->name}}</td>
                                        <td>{{$data->check_in}}</td>
                                        <td>{{$data->check_out}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        $('div.alert').delay(2000).slideUp(3000);
    </script>
@endsection
