@extends('layouts.admin')
@section('content')


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">{{$data->name}}
            <a href="{{url('admin/users')}}" class="float-end btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> <b>id</b> </th>
                        <th> <b>Name</b> </th>
                        <th> <b>Email</b> </th>
                        <th> <b>Photo</b> </th>
                        <th> <b>Role</b> </th>

                    </tr>
                </thead>

                <tbody>
                    @if($data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>

                            <td style="height: 70px; width: 70px; text-align: center;">
                                @if($data->image)
                                    <img src="{{ asset('storage/' . $data->image) }}" alt="User Photo" style="max-height: 100%; max-width: 100%; vertical-align: middle;">
                                @else
                                    <img src="{{ asset('storage/user/inconnu.jpg') }}" alt="Default Photo" style="max-height: 100%; max-width: 100%; vertical-align: middle;">
                                @endif
                            </td>

                            @if($data->role_as === 1)
                                <td>Admin</td>
                            @else
                                <td>User</td>
                            @endif

                        </tr>

                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>





<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endsection


