<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Laikipia CDF</title>
  <link rel="icon" type="image/png" href="{{ asset('images/laikipia.png')}}"/>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/fonts/material-icon/css/material-design-iconic-font.min.css')}}">


</head>

<body class=" {{ request()->routeIs('home') ? 'sub_page' : 'sub_page' }} ">
  
<!-- <div class="page-loader">
	<div class="spinner"></div>
	<div class="txt">Cargando<br>vacaciones</div>
</div>

<style>
  .page-loader{
	width: 100%;
	height: 100vh;
	position: absolute;
	background: #272727;
	z-index: 1000;
	.txt{
		color: #666;
		text-align: center;
		top: 40%;
		position: relative;
		text-transform: uppercase;
		letter-spacing: 0.3rem;
		font-weight: bold;
		line-height: 1.5;
	}
}

/* SPINNER ANIMATION */
.spinner {
	position: relative;
	top: 35%;
  width: 80px;
  height: 80px;
  margin: 0 auto;
  background-color: #fff;

  border-radius: 100%;  
  -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
  animation: sk-scaleout 1.0s infinite ease-in-out;
}

</style>
<script>
  $(window).on('load',function(){
	setTimeout(function(){ // allowing 3 secs to fade out loader
	$('.page-loader').fadeOut('slow');
	},3500);
});
</script> -->

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section mb-2" style="background-color: #1a2e35;">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="{{ route('home')}}">
            <img src="{{ asset('images/laikipia.png')}}" alt="" />
            <span>
              Laikipia CDF
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('home')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Open Bursaries </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="category.html"> Category </a>
              </li> -->
            </ul>
            <div class="user_option">
              @if (Auth::check())
                <a href="{{route('student.logout')}}">
                  <span>
                    Logout
                  </span>
                </a>
              @else
                <a href="{{route('student.register')}}">
                  <span>
                    Register
                  </span>
                </a>
              @endif
              
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
          <div>
            <div class="custom_menu-btn ">
              <button>
                <span class=" s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
          </div>

        </nav>
      </div>
    </header>
 
    </div>

    
  
    @yield('content')

  <!-- footer section -->
  <footer class="container-fluid footer_section  ">
    <div class="container">
      <p>
        &copy; <span id="displayDate"></span> Powered by 
        <a href="https://www.tsconect.com/"> <strong>Tsconect</strong></a>
      </p>
    </div>
  </footer>

<style>
  .list-group-item.active {
    background-color: #17a0b6 !important;
}

.footer_section {
  background: rgba(26, 46, 53, 0.2);
 
}

</style>
  <script>
  $(document).ready(function() {
    // Check for Toastr notifications
    @if(session('success'))
      toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
      toastr.error("{{ session('error') }}");
    @endif

    @if(session('warning'))
      toastr.warning("{{ session('warning') }}");
    @endif

    @if(session('info'))
      toastr.info("{{ session('info') }}");
    @endif
  });
</script>
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
  <script src="{{ asset('js/custom.js') }}"></script>



</body>


</html>