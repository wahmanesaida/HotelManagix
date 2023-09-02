@extends('layouts.admin')
@section('content')
<div class="card">

    <p class="text-danger" id="affiche"></p>

  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">
          <p style="color: #7e8d9f;font-size: 20px;">Invoice >>  <strong > </strong></p>
        </div>
        <div class="col-xl-3 float-end">
          <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
              class="fas fa-print text-primary"></i> Print</a>
          <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
              class="far fa-file-pdf text-danger"></i> Export</a>
        </div>
        <hr>
      </div>

      <div class="container">
        <div class="col-md-12">
          <div class="text-center">
            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
            <p class="pt-0"><b>HotelManagix</b></p>
          </div>

        </div>

        <div class="row">
          <div class="col-xl-8">

          </div>
          <div class="col-xl-4">
            <p class="text-muted">Invoice</p>
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">Creation Date: </span>{{now()}}</li>

            </ul>
          </div>
        </div>
        <br>
        <br>
        <br>

        <div class="row my-2 mx-1 justify-content-center">
            <form action="{{url('admin/process-payment/{client_id}/{reservation_id}')}}" method="post">
                @csrf
                <table class="table table-striped table-borderless">
                    <tr>
                        <th style="background-color:#CCA772;">Client</th>
                        <td>
                        <select name="client_id" id="client_id" class="form-control">
                            @foreach ($reservations as $client)
                                <option value="{{ $client->clients->id }}">
                                    {{ $client->clients->name }}
                                </option>
                            @endforeach
                        </select>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th style="background-color:#CCA772;">Reservation Id</th>
                        <td>
                            <select name="reservation_id_placeholder" id="reservation_id_placeholder" class="form-control">
                                <option value="" selected>Available reservation</option>
                            </select>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th style="background-color:#CCA772;">departure_date</th>
                        <td ><span class="form-control" id="departure_date"></span></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th style="background-color:#CCA772;">release_date</th>
                        <td ><span class="form-control" id="release_date"></span></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th style="background-color:#CCA772;">Room Type</th>
                        <td ><span class="form-control" id="room_type"></span></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th style="background-color:#CCA772;">Room Number</th>
                        <td ><span class="form-control" id="room_id"></span></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th style="background-color:#CCA772;">Room price</th>
                        <td ><span class="form-control" id="price"></span></td>
                    </tr>
                    <tr></tr>

                    <tr>
                        <th style="background-color:#CCA772;">Total Amount</th>
                        <td ><span class="form-control" id="total"></span></td>
                    </tr>
                    <tr></tr>



                </table>
                <br>
                <br>
                <button type="submit" class="btn btn-outline-secondary w-24 mr-1">Create Invoice </button>
</form>

        </div>
        <div class="row">
          <div class="col-xl-8">
          </div>
          <div class="col-xl-3">

            <p class="text-black float-start"><span class="text-black me-3"> Total Amount: </span><span
                id="prixtotal" style="font-size: 25px;"></span></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
            <p>Thank you for your purchase</p>
          </div>
          <div class="col-xl-2">
            <button type="button" id="payNowButton" class="btn btn-primary text-capitalize" style="background-color:#60bdf3 ;">
                Pay Now
            </button>
</div>

        </div>


      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#client_id").on('blur', function(){
        var selectedClientId = $(this).val();
        $.ajax({
            url: "{{ url('admin/invoice/get-reservation-info') }}/" + selectedClientId,
            dataType: 'json',
            beforeSend: function(){

                $("#reservation_id_placeholder").html('<option>Fetching ID...</option>');
            },
            success: function(res){
                var _idContenu = '';
                $.each(res.data, function(index, row){
                    _idContenu += '<option value="'+row.id+'">'+ row.id + '</option>';
                });
                $("#reservation_id_placeholder").html(_idContenu);
                $("#reservation_id_placeholder").trigger('change');


            }
        });
    });
    $("#reservation_id_placeholder").on('change', function(){
            var selectedReservation = $(this).val();
            var selectedClientId = $("#client_id").val();
            if (selectedReservation !== '') {
                $.ajax({
                    url: "{{ url('admin/invoice/get-reservation-info') }}/" + selectedClientId + "/" + selectedReservation,
                    dataType: 'json',
                    success: function(res){
                        var _departuredate = '';
                        var _releasedate = '';
                        var _room_id ='';
                        var _price ='';
                        var _total ='';
                        var _room_type ='';
                        var _error='';


                        $.each(res.data,function(index,row){
                            //console.log(res.data)
                            //console.log(row.rooms)
                            console.log(row.rooms.roomtype.price)
                            _departuredate+=''+row.departure_date + '';
                            _releasedate+=''+ row.release_date + '';
                            _room_type+=''+ row.rooms.roomtype.title + '';
                            _room_id+=''+ row.room_id + '';
                            _price+=''+ row.rooms.roomtype.price + 'Dhs';
                            _total+=''+ res.total_price + 'Dhs';
                            _error+=''+res.error +'';


                        });


                        $("#departure_date").html(_departuredate);
                        $("#release_date").html(_releasedate);
                        $("#room_type").html(_room_type);
                        $("#room_id").html(_room_id);
                        $("#price").html(_price);
                        $("#total").html(_total);
                        $("#prixtotal").html(_total);
                        $("#affiche").html(_error);
                    }
                });
            } else {
                $("#departure_date").html('<td class="form-control"><span>Select a reservation first</span></td>');
                $("#release_date").html('<td class="form-control"><span>Select a reservation first</span></td>');

            }
        });
});
</script>




@endsection
