@extends('layouts.app')
@section('content')
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

        <div class="section-intro text-center pb-80px">
            <h2>Contact Us</h2>
        </div>
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                <h2> Contact us for more information</h2>
                </div>

                <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                    <div class="address">
                        <i class="fas fa-map-marker-alt"></i>
                        <h4>Location:</h4>
                        <p>Eddahbi,Gueliz marrakech</p>
                    </div>

                    <div class="email">
                        <i class="fas fa-at"></i>
                        <h4>Email:</h4>
                        <p>esthétique@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="fas fa-phone-volume"></i>
                        <h4>Call:</h4>
                        <p>+212 693452015</p>
                    </div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3396.979999113054!2d-8.016004!3d31.634398!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafee8c16aaf64b%3A0x908a00581b0d2694!2sCentre%20dentaire%20Moqadem%20Haf%C3%A7a%20(Hollywood%20smile%2C%20Implant%2C%20proth%C3%A8se%2C%20Facettes%2C%20P%C3%A9dodontie%2C%20Blanchiment)%20Maroc%2C%20Marrakech!5e0!3m2!1sfr!2sma!4v1677161821153!5m2!1sfr!2sma" width="330" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="contact.php" method="POST" role="form" class="php-email-form">
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group col-md-6 mt-3 mt-md-0">
                        <label for="email">Your Email</label>
                        <input type="email" class="form-control" name="email" id="email" required >
                    </div>
                    </div>

                    <div class="form-group mt-3">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" rows="10" id="message" required ></textarea>
                    </div>


                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
                </div>

            </div>

            </div>
        </section><!-- End Contact Section -->
</section>
@include('footer')
@endsection('content')
