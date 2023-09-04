@extends('layouts.app')

@section('content')
<!-- about section -->
<main class="site-main">


    <!-- ================ start banner area ================= -->
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
        <div class="section-intro text-center pb-80px">
        <h2>About us</h2>
        </div>

        <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
            <div class="col-md-6">
                <div class="img-box">
                <img src="images/photos/8.jpg" width="100%" alt="">

                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                <div class="heading_container">
                    <h2>About <span>Hotel</span></h2>
                </div>
                <p>
                    has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors
                </p>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
    </section>
    @include('footer')
@endsection
