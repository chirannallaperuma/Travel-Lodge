@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header text-uppercase text-info">Room List</div>

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
                                <th>Hotel Name</th>
                                <th>Room No</th>
                                <th>Room type</th>
                                <th>Price per night</th>
                                <th>Max.person</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($rooms as $room)
                                <tr>
                                    <td>{{$room->hotel->hotel_name}}</td>
                                    <td>{{$room->room_no}}</td>
                                    <td>{{$room->room_type}}</td>
                                    <td>{{$room->price_night}}</td>
                                    <td>{{$room->max_person}}</td>
                                    <td>
                                        <button onclick="deleteRoom({{$room->id}})"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        $('div.alert').delay(2000).slideUp(3000);


        function deleteRoom(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value === true) {

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/delete-room')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {

                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                                location.reload();
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    result.dismiss;
                }
            })
        }
    </script>
@endsection
