@extends('layouts.admin')
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">All Reservations</h6>
    </div>
    <div class="card-body">
        @if(Session::has('error'))
        <p class="text-danger">{{session('error')}}</p>
        @endif
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="form-group search-container col-xl-8">
            <input type="text" id="search-email" class="form-control" placeholder="Search by email" style="background:#B0AC97">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>email</th>
                        <th>departure_date</th>
                        <th>release_date</th>
                        <th>room_id</th>
                        <th>total_adults</th>
                        <th>total_children</th>
                        <th>status</th>


                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if($reslist)
                        @foreach($reslist as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->email}}</td>
                            <td>{{$list->departure_date}}</td>
                            <td>{{$list->release_date}}</td>
                            <td>{{$list->room_id}}</td>
                            <td>{{$list->total_adults}}</td>
                            <td>{{$list->total_children}}</td>
                            <td>{{$list->status}}</td>



                            <td>
                                @if($list->status =='pending')
                                    <a href="{{ route('validateReservation', $list->id) }}" class="btn btn-info btn-sm"><i class="fa fa-check" aria-hidden="true"></i></a>
                                    <a onclick="return confirm('Are you sure to delete this data?')" href="{{ route('cancelReservation', $list->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
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
