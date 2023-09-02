@extends('layouts.admin')
@section('content')


  <!--Start Dashboard Content-->

  <div class="card mt-3" style="background:#CCA772;">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">{{$client}} <span class="float-right"><i class="fa fa-user"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                        <div class="progress-bar" style="width:{{$client/$maxclient *100}}%; background-color:black;"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Total Customers <span class="float-right">{{number_format(($client/$maxclient *100)-100 ,1) }}% <i class="zmdi zmdi-long-arrow-up"></i></span> </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">{{$countusers}} <span class="float-right"><i class="fa fa-eye"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:{{$countusers/$maxusers *100}}%; background-color:black;"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Total Visitors <span class="float-right">{{number_format(($countusers/$maxusers *100)-100 ,1) }}%<i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">{{$countBouking}} <span class="float-right"><i class="fa fa-ticket"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:{{$progressBooking}}%; background-color:black;"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Reservations <span class="float-right">{{number_format($progressBooking-100, 1)}}% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">{{$counthistory}} <span class="float-right"><i class="fa fa-envira"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:{{$progressHistory}}%; background-color:black;"></div>
                    </div>
                  <p class="mb-0 text-white small-font">History <span class="float-right">{{number_format($progressHistory -100, 1)}}% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
        </div>
    </div>
 </div>

 <div class="row" >
     <div class="col-12 col-lg-8 col-xl-8" >
	    <div class="card" style="background:#CCA772;">
		 <div class="card-header">Site Traffic

		 </div>
		 <div class="card-body">
		    <ul class="list-inline">
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-white"></i>New Visitor</li>
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light"></i>Old Visitor</li>
			</ul>
			<div class="chart-container-1">
			  <canvas id="chart1"></canvas>
			</div>
		 </div>



		</div>
	 </div>

     
@endsection
