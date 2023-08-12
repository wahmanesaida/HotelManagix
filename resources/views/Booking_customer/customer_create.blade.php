@extends('layouts.app');
@section('content')
<main class="site-main">
    <section class="home1-banner-area" id="home">
        <div class="container h-100">
            <div class="home1-banner">
            <div class="text-center">
                <h4>See What a Difference a stay makes</h4>
                <h1>HotelManagix</h1>
                <a class="button home-banner-btn" href="#">Book Now</a>
            </div>
            </div>
        </div>
        </section>

        <section class="section-margin">
        <div class="container">

         <!-- <p>L'ID de l'utilisateur connecté est : {{ auth()->user()->id }}</p> -->
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif

        @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
        @endif

        <form method="post" enctype="multipart/form-data" action="{{url('admin/reservation')}}">
            @csrf
            <div id="form">
                <h2 class="text-white text-center">Book Now</h2>
                <div id="first-group">
                    <div id="content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="email" id="input-group" value="{{ old('email') }}" placeholder="Email">
                    </div>

                    <div id="content">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="placeholder-text" style="color: white;">Checkin Date</span>
                        <br>
                        <input type="date" name="departure_date" class="form-control checkin-date">

                    </div>

                    <div id="content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="total_adults" id="input-group"  placeholder="Total Adults">
                    </div>

                    <div id="content">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <select id="input-group" name="roomtype_id"  class="roomtype-list" style="background-color: black;">
                            <option value="">Available Room types</option>

                        </select>
                    </div>
                </div>


                <div id="second-group">
                    <div id="content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="total_children"  id="input-group" value="{{ old('total_children') }}" placeholder="Total Children">
                    </div>

                    <div id="content">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="placeholder-text" style="color: white;">Checkout Date</span>
                        <br>
                        <input type="date" name="release_date"   class="form-control checkout-date">

                    </div>


                    <div id="content">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <select id="input-group" name="room_id"   class="room-list" style="background-color: black;">
                            <option value="">Available Rooms</option>

                        </select>
                    </div>

                </div>
                <input type="hidden" name="client_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="reference" value="customer">
                <button type="submit" value="Submit" id="submit-btn">Book Now</button>

            </div>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate=$(this).val();
            //console.log(_checkindate);
            $.ajax({
                url:"{{url('admin/reservation')}}/available-roomtypes/"+_checkindate,
                //by defaul type is get
                dataType:'json',
                beforeSend:function(){
                    $(".roomtype-list").html('<option>Fetching available room types...</option>');
                    $(".room-list").html('<option>Select a room type first</option>');
                },
                success:function(res){
                    //console.log(res);
                    var _contenu='';
                    $.each(res.data,function(index,row){
                        _contenu+='<option value="'+row.id+'">'+row.title+'</option>';
                    });
                    $(".roomtype-list").html(_contenu).prepend('<option value="" selected>Available Room types</option>');
                }
            });
        });

        $(".roomtype-list").on('change', function(){
            var selectedRoomType = $(this).val();
            var _checkindate = $(".checkin-date").val();
            if (selectedRoomType !== '') {
                $.ajax({
                    url: "{{ url('admin/reservation/available-rooms') }}/" + _checkindate + "/" + selectedRoomType,
                    dataType: 'json',
                    success: function(res){
                        var _roomContenu = '';
                        $.each(res.data,function(index,row){
                            _roomContenu+='<option value="'+row.id+'">'+ row.title + '</option>';
                        });
                        $(".room-list").html(_roomContenu);
                    }
                });
            } else {
                $(".room-list").html('<option>Select a room type first</option>');
            }
        });
    });

    </script>





@endsection
