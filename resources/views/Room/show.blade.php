
@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Rooms
                <a href="{{url('admin/room')}}" class="float-end btn btn-info btn-sm">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/room')}}" method="post">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        @if($data)
                        <tr>
                            <th>Room Type</th>
                            <td>{{$data->Roomtype->title}}</td>
                        </tr>

                        <tr>
                            <th>Title</th>
                            <td>{{$data->title}}</td>
                        </tr>
                        <tr>
                            <th>Room Facilities</th>
                            <td>{{$data->room_facilities}}</td>
                        </tr>
                        <tr>
                            <th>Room Rate</th>
                            <td>{{$data->room_rate}}</td>
                        </tr>
                        <tr>
                            <th>Room Status</th>
                            <td>
                             {{$data->room_status}}
                            </td>


                        </tr>

                        @endif
                    </table>
                </form>
            </div>
        </div>
    </div>

    



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endsection


