@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header text-uppercase text-info">Payment List</div>

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
                                <th>Customer Name</th>
                                <th>Room No</th>
                                <th>Paid Amount</th>
                                <th>Payment Date</th>
                            </tr>
                            </thead>
                            @foreach ($hotel->rooms as $room)
                                @foreach ($room->bookings as $booking)
                                    <tr>
                                        <td>{{$booking->user->name}}</td>
                                        <td>{{$booking->rooms->room_no}}</td>
                                        <td>{{$booking->payment->amount}}</td>
                                        <td>{{$booking->payment->created_at}}</td>
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
