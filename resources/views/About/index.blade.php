
@extends('layouts.admin')
@section('content')


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info">About
                                <a href="{{url('admin/aboutpage/create')}}" class="float-end btn btn-info btn-sm">New About Page</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            @if(Session::has('error'))
                            <p class="text-danger">{{session('error')}}</p>
                            @endif
                            <div class="form-group search-container col-xl-8">
                                <input type="text" id="search-email" class="form-control" placeholder="Search by name" style="background:#B0AC97">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>Title</th>
                                            <th>Presentation</th>
                                            <th>Description</th>
                                            <th>Photo1</th>
                                            <th>Photo2</th>
                                            <th>Photo3</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if($data)
                                            @foreach($data as $information)
                                            <tr>

                                                <td>{{$information->title}}</td>
                                                <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{$information->id}}">
                                                    find out more ...
                                                </button></td>

                                                <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal2{{$information->id}}">
                                                    find out more ...
                                                </button></td>
                                                <td style=" width: 70px; text-align: center;">
                                                <img src="{{ asset('storage/' . $information->photo1) }}" alt="Photo" style="max-height: 100%; max-width: 100%; vertical-align: middle;">
                                                </td>
                                                <td style=" width: 70px; text-align: center;">
                                                <img src="{{ asset('storage/' . $information->photo2) }}" alt="Photo" style="max-height: 100%; max-width: 100%; vertical-align: middle;">
                                                </td>
                                                <td style=" width: 70px; text-align: center;">
                                                <img src="{{ asset('storage/' . $information->photo3) }}" alt="Photo" style="max-height: 100%; max-width: 100%; vertical-align: middle;">
                                                </td>

                                                <td>
                                                    <a href="{{url('admin/aboutpage/'.$information->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    <a href="{{url('admin/aboutpage/'.$information->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete this data?')" href="{{url('admin/aboutpage/'.$information->id.'/delete')}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal{{$information->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$information->id}}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{$information->id}}">Description</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                     {{$information->description1}}
                                                    </div>

                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal fade" id="exampleModal2{{$information->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label{{$information->id}}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal2Label{{$information->id}}">Description</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                     {{$information->description2}}
                                                    </div>

                                                    </div>
                                                </div>
                                                </div>
                                            @endforeach
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

<script>
 $(document).ready(function() {
    $('#search-email').on('input', function() {
        var searchTerm = $(this).val().toLowerCase();
        filterUsers(searchTerm);
    });
});

function filterUsers(searchTerm) {
    $('table tbody tr').each(function() {
        var userEmail = $(this).find('td:nth-child(2)').text().toLowerCase();
        if (userEmail.includes(searchTerm) || userEmail.includes('@' + searchTerm)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}



    </script>

@endsection

