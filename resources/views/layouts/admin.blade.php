<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <!-- loader -->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Vector CSS -->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
    <!-- simplebar CSS -->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css">
    <!-- Icons CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <!-- Sidebar CSS -->
    <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet">
    <!-- Custom Style -->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet">
    <!-- booking Style -->
    <link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_51Nk45JFkFCemfgWuExd1tXbvBqoZlGs5lh5QGOpTkaW3ckQTRMKiLJgtzbxbdCRLBCzUMNOGQTP3Pk1M9wz72acV00bVYxKwwD');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



</head>
<body class="bg-theme bg-theme1">
    <!-- Start wrapper-->
 <div id="wrapper">

 <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
     <a href="index.html">
      <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
      <h5 class="logo-text">Dashboard Admin</h5>
    </a>
  </div>
  <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION</li>
     <li>
       <a href="{{url('admin/dashboard')}}">
         <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
       </a>
     </li>

     <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="zmdi zmdi-face"></i> <span>Customers</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="usersDropdown">
            <a class="dropdown-item" href="{{url('admin/client/create')}}">Add Customer</a>
            <a class="dropdown-item" href="{{url('admin/client')}}">Customers List</a>

        </div>
    </li>


     <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="zmdi zmdi-account"></i> <span>Users</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="usersDropdown">
            <a class="dropdown-item" href="{{ url('admin/users') }}">User List</a>
            <a class="dropdown-item" href="{{url('admin/users/create')}}">Add Admin</a>

        </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="zmdi zmdi-view-list"></i> <span>Reservations</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="usersDropdown">
                <a class="dropdown-item" href="{{url('admin/reservation/create')}}">Add Booking</a>
                <a class="dropdown-item" href="{{url('admin/reservations_list')}}">Reservations List</a>
                <a class="dropdown-item" href="{{url('admin/History')}}">History</a>

            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="zmdi zmdi-check"></i> <span>Check Processes</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="usersDropdown">
                <a class="dropdown-item" href="{{url('admin/checkin')}}">Check In</a>
                <a class="dropdown-item" href="{{url('admin/checkout')}}">Check Out</a>

            </div>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="zmdi zmdi-money"></i> <span>invoice</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="usersDropdown">
                <a class="dropdown-item" href="{{url('admin/invoice')}}">add facture</a>


            </div>
        </li>

     <li>
       <a href="calendar.html">
         <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
         <small class="badge float-right badge-light">New</small>
       </a>
     </li>

     <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="zmdi zmdi-hotel"></i> <span>Rooms</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="usersDropdown">
                <a class="dropdown-item" href="{{url('admin/room/create')}}">Add room</a>
                <a class="dropdown-item" href="{{url('admin/room')}}">View All</a>

            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="zmdi zmdi-hotel"></i> <span>Room Types</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="usersDropdown">
                <a class="dropdown-item" href="{{url('admin/roomtype/create')}}">Add Type</a>
                <a class="dropdown-item" href="{{url('admin/roomtype')}}">View All</a>

            </div>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="zmdi zmdi-hotel"></i> <span>About management</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="usersDropdown">
                <a class="dropdown-item" href="{{url('admin/aboutpage/create')}}">Add info</a>
                <a class="dropdown-item" href="{{url('admin/aboutpage')}}">View All</a>

            </div>
        </li>



     <li class="sidebar-header">LABELS</li>
     <li><a href="{{url('admin/success')}}"><i class="zmdi zmdi-coffee text-success"></i> <span>Important</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>

   </ul>

  </div>
  <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
<nav class="navbar navbar-expand fixed-top" id ="topNavbar">
 <ul class="navbar-nav mr-auto align-items-center">
   <li class="nav-item">
     <a class="nav-link toggle-menu">
      <i class="icon-menu menu-icon"></i>
    </a>
   </li>
   <li class="nav-item">
     <form class="search-bar">
       <input type="text" class="form-control" placeholder="Enter keywords">
        <a href="javascript:void();"><i class="icon-magnifier"></i></a>
     </form>
   </li>
 </ul>


   </li>
   <li class="nav-item">
     <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">

        <span class="user-profile"><img src="{{ asset('storage/user/inconnu.jpg') }}" class="img-circle" alt="user avatar"></span>

     </a>
     <ul class="dropdown-menu dropdown-menu-right">
      <li class="dropdown-item user-details">
       <a href="">
          <div class="media">

                <div class="avatar"><img class="align-self-start mr-3" src="{{ asset('storage/user/inconnu.jpg') }}" alt="user avatar"></div>

           <div class="media-body">
           <h6 class="mt-2 user-title" style="color:black">saida</h6>
           <p class="user-subtitle" style="color:black">saida@gmail.com</p>
           </div>
          </div>
         </a>
       </li>

       <li class="dropdown-divider"></li>
       <li class="dropdown-item"><a class="icon-wallet mr-2" href="{{url('admin/Account')}}"></a> Account</li>

       <li class="dropdown-divider"></li>
       <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
     </ul>
   </li>
 </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>

 <div class="content-wrapper">
   <div class="container-fluid">

 <!--Start Dashboard Content-->


   @yield('content')


<div class="overlay toggle-menu"></div>
<!--end overlay-->
</div>
<!-- End container-fluid-->
</div><!--End content-wrapper-->

<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->

<!--Start footer-->
<footer class="footer">
  <div class="container">
    <div class="text-center">
      HotelManagix © 2023
    </div>
  </div>
</footer>
<!--End footer-->

<!--start color switcher-->
<div class="right-sidebar">
  <div class="switcher-icon">
    <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
  </div>
  <div class="right-sidebar-content">
  <p class="mb-0">Gaussion Texture</p>
      <hr>

      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>

      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		    <li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
  </div>
</div>
<!--end color switcher-->

</div><!--End wrapper-->

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- simplebar js -->
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
<!-- sidebar-menu js -->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<!-- loader scripts -->
<script src="{{ asset('assets/js/jquery.loading-indicator.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('assets/js/app-script.js') }}"></script>
<!-- Chart js -->
<script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>
<!-- Index js -->
<script src="{{ asset('assets/js/index.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const topNavbar = document.getElementById('topNavbar');

    if (topNavbar) {
        const scrollThreshold = 100;
        window.addEventListener('scroll', function () {
            if (window.scrollY > scrollThreshold) {
                topNavbar.classList.add('bg-dark');
            } else {
                topNavbar.classList.remove('bg-dark');
            }
        });
    }
});
</script>



</body>
</html>
