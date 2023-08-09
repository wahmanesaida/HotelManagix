
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Client
                <a href="{{url('admin/client')}}" class="float-end btn btn-success btn-sm">View All Clients</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form action="{{url('admin/client')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        @if($data)

                        <tr>
                            <th>Full name</th>
                            <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$data->phone}}</td>
                        </tr>
                        <tr>
                            <th>CIN</th>
                            <td>{{$data->CIN}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$data->Address}}</td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><img width="100" src="{{ asset('storage/'.$data->photo) }}" /></td>
                        </tr>

                        @endif
                    </table>
                </form>
            </div>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>



