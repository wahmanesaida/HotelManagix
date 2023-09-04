@extends('layouts.app')

@section('content')
<!-- ================ header section start ================= -->





      <!-- <div class="search_input" id="search_input_box">
        <div class="container">
          <form class="d-flex justify-content-between">
            <input type="text" class="form-control" id="search_input" placeholder="Search Here">
            <button type="submit" class="btn"></button>
            <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
          </form>
        </div>
      </div> -->


	<!-- ================ header section end ================= -->

  <main class="site-main">


    <!-- ================ start banner area ================= -->
    <section class="home-banner-area" id="home">
      <div class="container h-100">
        <div class="home-banner">
          <div class="text-center">
            <h4>See What a Difference a stay makes</h4>
            <h1>Luxury <em>is</em> personal</h1>
            <a class="button home-banner-btn" href="#">Book Now</a>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!-- ================ start banner form ================= -->
    <form class="form-search form-search-position">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 gutters-19">
            <div class="form-group">
              <input class="form-control" type="text" placeholder="Enter your keywords.." required>
            </div>
          </div>
          <div class="col-lg-6 gutters-19">
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <div class="form-select-custom">
                    <select name="" id="">
                      <option value="" disabled selected>Arrival</option>
                      <option value="8 AM">8 AM</option>
                      <option value="12 PM">12 PM</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-sm gutters-19">
                <div class="form-group">
                  <div class="form-select-custom">
                    <select name="" id="">
                      <option value="" disabled selected>Number of room</option>
                      <option value="8 AM">8 AM</option>
                      <option value="12 PM">12 PM</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm gutters-19">
            <div class="form-group">
              <div class="form-select-custom">
                <select name="" id="">
                  <option value="" disabled selected>Departure</option>
                  <option value="8 AM">8 AM</option>
                  <option value="12 PM">12 PM</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm gutters-19">
            <div class="form-group">
              <div class="form-select-custom">
                <select name="" id="">
                  <option value="" disabled selected>Adult</option>
                  <option value="8 AM">8 AM</option>
                  <option value="12 PM">12 PM</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm gutters-19">
            <div class="form-group">
              <div class="form-select-custom">
                <select name="" id="">
                  <option value="" disabled selected>Child</option>
                  <option value="8 AM">8 AM</option>
                  <option value="12 PM">12 PM</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-lg-4 gutters-19">
            <div class="form-group">
              <button class="button button-form" type="submit">Check Availability</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- ================ end banner form ================= -->

    <!-- ================ welcome section start ================= -->
    <section class="welcome">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="row no-gutters welcome-images">
              <div class="col-sm-7">
                <div class="card">
                  <img class="" src="img/home/welcomeBanner1.png" alt="Card image cap">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="card">
                  <img class="" src="img/home/welcomeBanner2.png" alt="Card image cap">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <img class="" src="img/home/welcomeBanner3.png" alt="Card image cap">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="welcome-content">
              <h2 class="mb-4"><span class="d-block">Welcome</span> to our residence</h2>
              <p>Beginning blessed second a creepeth. Darkness wherein fish years good air whose after seed appear midst evenin, appear void give third bearing divide one so blessed moved firmament gathered </p>
              <p>Beginning blessed second a creepeth. Darkness wherein fish years good air whose after seed appear midst evenin, appear void give third bearing divide one so blessed</p>
              <a class="button button--active home-banner-btn mt-4" href="/about">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ welcome section end ================= -->



    <!-- ================ Explore section start ================= -->
    <section class="section-margin">
      <div class="container">
        <div class="section-intro text-center pb-80px">
          <div class="section-intro__style">
            <img src="img/home/bed-icon.png" alt="">
          </div>
          <h2>Explore Our Rooms</h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-explore">
              <div class="card-explore__img">
                <img class="card-img" src="img/home/explore1.png" alt="">
              </div>
              <div class="card-body">
                <h3 class="card-explore__price">$150.00 <sub>/ Per Night</sub></h3>
                <h4 class="card-explore__title"><a href="#">Classic Bed Room</a></h4>
                <p>Beginning fourth dominion creeping god was. Beginning, which fly yieldi dry beast moved blessed </p>
                <a class="card-explore__link" href="#">Read more <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-explore">
              <div class="card-explore__img">
                <img class="card-img" src="img/home/explore2.png" alt="">
              </div>
              <div class="card-body">
                <h3 class="card-explore__price">$170.00 <sub>/ Per Night</sub></h3>
                <h4 class="card-explore__title"><a href="#">Premium Room</a></h4>
                <p>Beginning fourth dominion creeping god was. Beginning, which fly yieldi dry beast moved blessed </p>
                <a class="card-explore__link" href="#">Read more <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-explore">
              <div class="card-explore__img">
                <img class="card-img" src="img/home/explore3.png" alt="">
              </div>
              <div class="card-body">
                <h3 class="card-explore__price">$190.00 <sub>/ Per Night</sub></h3>
                <h4 class="card-explore__title"><a href="#">Family Room</a></h4>
                <p>Beginning fourth dominion creeping god was. Beginning, which fly yieldi dry beast moved blessed </p>
                <a class="card-explore__link" href="#">Read more <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @include('footer')
@endsection

