
@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Client
                <a href="{{url('admin/client')}}" class="float-end btn btn-info btn-sm">View All Clients</a>
            </h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/client')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Full name <span class="text-danger">*</span></th>
                            <td><input type="text" class="form-control" name="name"></td>
                        </tr>
                        <tr>
                            <th>Email <span class="text-danger">*</span></th>
                            <td><input type="email" name="email" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Phone <span class="text-danger">*</span></th>
                            <td><input type="text" name="phone" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>CIN <span class="text-danger">*</span></th>
                            <td><input type="text" name="CIN" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><input type="text" name="Address" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>photo <span class="text-danger">*</span></th>
                            <td><input type="file" name="photo"></td>
                        </tr>
                        <tr>
                            <th>Password <span class="text-danger">*</span></th>
                            <td><input type="password" name="password" class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-info"></td>
                        </tr>
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


