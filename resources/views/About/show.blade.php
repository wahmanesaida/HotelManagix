
@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">About Page
                <a href="{{url('admin/aboutpage')}}" class="float-end btn btn-info btn-sm">back</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/aboutpage')}}" method="post">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        @if($data)

                        <tr>
                            <th>Title</th>
                            <td>{{$data->title}}</td>
                        </tr>
                        <tr>
                            <th>Presentaion</th>
                            <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{$data->id}}">
                                                    find out more ...
                            </button></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal2{{$data->id}}">
                                                    find out more ...
                            </button></td>
                        </tr>
                        <tr>
                            <th>Photo 1</th>
                            <td>
                                <img src="{{ asset('storage/' . $data->photo1) }}" alt="Room Photo" style=" width: 70px; text-align: center;">
                            </td>
                        </tr>
                        <tr>
                            <th>Photo 2</th>
                            <td >
                                <img src="{{ asset('storage/' . $data->photo2) }}" alt="Room Photo" style=" width: 70px; text-align: center;">
                            </td>
                        </tr>
                        <tr>
                            <th>Photo 3</th>
                            <td>
                                <img src="{{ asset('storage/' . $data->photo3) }}" alt="Room Photo" style=" width: 70px; text-align: center;">
                            </td>
                        </tr>

                        <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$data->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{$data->id}}">Description</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{$data->description1}}
                                </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal2{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label{{$data->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal2Label{{$data->id}}">Description</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{$data->description2}}
                                </div>

                                </div>
                            </div>
                        </div>

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


