
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Add Room
                <a href="{{url('admin/room')}}" class="float-end btn btn-success btn-sm">View All</a>
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
                        <tr>
                            <th>Room Type</th>
                            <td>
                                <select name="roomtp_id"  class="form-control">
                                    <option value="0">Select</option>
                                    @foreach($roomtype as $room)
                                        <option value="{{$room->id}}">{{$room->title}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td><input type="text" class="form-control" name="title"></td>
                        </tr>
                        <tr>
                            <th>Room Facilities</th>
                            <td><textarea name="room_facilities" id="" cols="13" rows="2" class="form-control"></textarea></td>
                        </tr>
                        <tr>
                            <th>Room Rate</th>
                            <td><input type="text" name="room_rate" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Room Status</th>
                            <td>
                                <select name="room_status"  class="form-control">
                                <option value="">Select</option>
                                <option value="Occupied">Occupée</option>
                                <option value="Vacant">Vacante</option>
                                </select>

                            </td>


                        </tr>

                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-primary"></td>
                        </tr>
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



