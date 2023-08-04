<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resort booking form</title>
    <link rel="stylesheet" href="/css/reservation.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">





</head>
<body>
    <div class="container">
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
                <h1 class="text-white text-center">Booking Now</h1>

                <div id="first-group">

                    <div id="content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <select id="input-group"  name="client_id">
                            <option value="">Select Client</option>
                            <option>Select</option>
                            @foreach($data as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div id="content">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="placeholder-text" style="color: white;">Checkin Date</span>
                        <br>
                        <input type="date" name="departure_date" class="form-control checkin-date">

                    </div>

                    <div id="content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="total_adults" id="input-group" placeholder="Total Adults">
                    </div>

                </div>

                <div id="second-group">

                    <div id="content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="total_children"  id="input-group" placeholder="Total Children">
                    </div>



                    <div id="content">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="placeholder-text" style="color: white;">Checkout Date</span>
                        <br>
                        <input type="date" name="release_date" class="form-control checkout-date">

                    </div>

                    <div id="content">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <select id="input-group" name="room_id" class="room-list" style="background-color: black;">
                            <option value="">Available Rooms</option>

                        </select>
                    </div>

                </div>

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
                url:"{{url('admin/reservation')}}/available-rooms/"+_checkindate,
                //by defaul type is get
                dataType:'json',
                beforeSend:function(){
                    $(".room-list").html('<option>Fetching available rooms...</option>');

                },
                success:function(res){
                    //console.log(res);
                    var _contenu='';
                    $.each(res.data,function(index,row){
                        _contenu+='<option value="'+row.id+'">'+row.title+'</option>';
                    });
                    $(".room-list").html(_contenu);
                }
            });
        });
         });
    </script>

</body>
</html>
