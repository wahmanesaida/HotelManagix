<!-- Begin Page Content -->
<div class="container-fluid">


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Booking History</h6>
    </div>
    <div class="card-body">
        @if(Session::has('error'))
        <p class="text-danger">{{session('error')}}</p>
        @if(Session::has('errortype'))
        <p class="text-danger">{{session('errortype')}}</p>
        @endif
        @endif
        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Booking Number</th>
            <th>Email</th>
            <th>CIN</th>
            <th>Room type</th>
            <th>Room</th>
            <th>checkin</th>
            <th>Check out date</th>
            <th>payement</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @if($data && count($data) > 0)
            @foreach($data as $dt)
                <tr>
                    <td>{{$dt->id}}</td>
                    <td>{{$dt->email}}</td>
                    <td>{{$dt->clients->CIN}}</td>
                    <td>{{$dt->rooms->Roomtype->title}}</td>
                    <td>{{$dt->rooms->title}}</td>
                    <td>{{$dt->checkin}}</td>
                    <td>{{$dt->checkout_date}}</td>
                    <td>{{$dt->payement_status}}</td>
                    <td>
                        <a href="{{ route('processCheckout', $dt->id) }}" class="btn btn-success btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9"><b>No record found</b></td>
            </tr>
        @endif
    </tbody>
</table>

        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">


