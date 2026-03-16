@extends('frontend.app')
@section('content')

  <section class="experience_section ">
    <div class="">
      <header>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Sliding Images -->
                <div class="carousel-item active">
                    <img src="{{ asset('images/students.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/student.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/female.jpg')}}" class="d-block w-100" alt="...">
                </div>
    
                <!-- Static Content (Common for all slides) -->
          
                        <div class="row" >
                          <div class="col-md-5 offset-md-1 mt-5" >
                            <div class="detail-box form-inner-1 ">
                              @if($latestOpenApplication)


                                <h1 class="text-center mb-4">
                                {{$latestOpenApplication->name ?? 'No Open Bursary Applications Available'}}
                                </h1>
                                <div class="rounded bg-gradient-4 text-white shadow p-5 text-center mb-5" style="background-color: #1cbbb4;">
                                  <p class="mb-0 font-weight-bold text-uppercase text-black">Applications Close in </p>
                                  <div id="clock-c" class="countdown py-4"></div>
                                </div>
            
                    
                                <div class="btn-box">
                                  <a href="{{ route('student.dashboard') }}" class="btn-1">
                                    Apply
                                  </a>
                                  @if (Auth::check())
                                    <a href="{{ route ('student.applications')}}" class="btn-2">
                                      My Applications
                                    </a>
                                  @else
                                    <a href="{{ route ('student.register')}}" class="btn-2">
                                      Register
                                  </a>
                                  @endif
                                </div>
                              @else
                                <h1 class="text-center mb-4">
                                  No open applications
                                </h1>
                              @endif
                            </div>
                          </div>
                         
                    
                          <div class="offset-md-1 col-md-4 img-container" >
                            @if (!Auth::check())
                            <div class="form-inner pb-4 mt-5">
                              <form action="{{ route('login.submit') }}" method="POST">
                                @csrf
                                <div class="form-header">
                                  <h2>Student Login Portal</h2>
                                  <img src="images/sign-up.png" alt="" class="sign-up-icon">
                                </div>
          
                                @if ($errors->any())
                                  @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                      {{ $error }}
                                    </div>
                                  @endforeach
                                @endif
          
                                <div class="form-group">
                                  <label for="id_birth_cert_no">ID/ Birth Certificate No</label>
                                  <input type="text" id="id_birth_cert_no" name="id_birth_cert_no" class="form-control" data-validation="length alphanumeric" data-validation-length="3-12">
                                </div>
                                <div class="form-group">
                                  <label for="password">Password:</label>
                                  <input type="password" id="password" name="password" class="form-control" data-validation="length" data-validation-length="min8">
                                  <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                                </div>
                                <button type="submit" class="login-button mb-4">Log In</button>
                              </form>
                            </div>
                            @endif
          
                            @if (Auth::check())
                              <div class="img-box">
                              </div>
                            @endif
                        </div>
                        
                        </div>
                      </div>
                    </div>
                
    </header>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    
   
      

           
          
    
    </div>
  </section>

  <style>
    .btn2:hover{
      background-color: #1cbbb4; 
      color: #fff;
    }
    .btn2{
      color:red !important;
    }
    .countdown {
text-transform: uppercase;
font-weight: bold;
}

.carousel-item {
    height: 100vh;
    min-height: 350px;
    width: 100%;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.countdown span {
text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
font-size: 3rem;
margin-left: 0.8rem;
}

.countdown span:first-of-type {
margin-left: 0;
}

.countdown-circles {
text-transform: uppercase;
font-weight: bold;
}

.countdown-circles span {
width: 100px;
height: 100px;
border-radius: 50%;
background: rgba(255, 255, 255, 0.2);
display: flex;
align-items: center;
justify-content: center;
box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
}

.countdown-circles span:first-of-type {
margin-left: 0;
}


h1, h2{
  color: #fff;

}

.wrapper {
	min-height: 100vh;
	display: flex;
	.image-holder {
		width: 69.9%;
	}
	.form-inner {
		width: 30.1%;
	}
}

.form-inner {
  background: rgba(26, 46, 53, 0.4); 
  padding-top: 16.36vh;
  padding-left: 4vw;
  padding-right: 4vw;
  border-radius: 20px;
}
.form-inner-1 {
  background: rgba(26, 46, 53, 0.4);
  padding-top: 6.36vh;
  padding-left: 2vw;
  padding-right: 2vw;
  border-radius: 20px;
}
form {
	width: 100%;
}
.form-header {
	text-align: center;
	margin-bottom: 39px;
}

label {
	margin-bottom: 11px;
	display: block;
  color: #fff;
}
.form-group {
	margin-bottom: 26px;
	position: relative;
}
.field-icon {
  float: right;
  margin-right: 17px;
  margin-top: -32px;
  position: relative;
  z-index: 2;
  color: #555; }
.login-button {
	border: none;
	width: 100%;
	height: 46px;
	border-radius: 22.5px;
	margin: auto;
	margin-top: 40px;
	cursor: pointer;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 0;
	background: #fd677a;
	color: #fff;
	text-transform: uppercase;
	font-size: 17px;
	overflow: hidden;
	-webkit-transform: perspective(1px) translateZ(0);
	transform: perspective(1px) translateZ(0);
	position: relative;
	-webkit-transition-property: color;
	transition-property: color;
	-webkit-transition-duration: 0.3s;
	transition-duration: 0.3s;
	&:before {
		content: "";
		position: absolute;
		z-index: -1;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		background: blue;
		-webkit-transform: scaleX(0);
		transform: scaleX(0);
		-webkit-transform-origin: 50%;
		transform-origin: 50%;
		-webkit-transition-property: transform;
		transition-property: transform;
		-webkit-transition-duration: 0.3s;
		transition-duration: 0.3s;
		-webkit-transition-timing-function: ease-out;
		transition-timing-function: ease-out;
	}
	&:hover {
		color: white;
		&:before {
			
			-webkit-transform: scaleX(1);
			transform: scaleX(1);
		}
	}
}
  </style>


<script>
  $(function () {
    var deadlineDate = '{{$latestOpenApplication->deadline?? '2021-12-31'}}'; 
    
    function getDeadlineDate() {
      var deadline = new Date(deadlineDate + 'T00:00:00');
      return deadline;
    }
    var now = new Date();
    var deadline = getDeadlineDate();
    if(now > deadline) {
      $('#clock-c').html('<span class="h1 font-weight-bold">Applications Closed</span>');
    } else {
      $('#clock-c').countdown(deadline, function(event) {
        $(this).html(event.strftime(''
          + '<span class="h1 font-weight-bold">%D</span> Dy%!d'
          + '<span class="h1 font-weight-bold">%H</span> Hr'
          + '<span class="h1 font-weight-bold">%M</span> Min'
          + '<span class="h1 font-weight-bold">%S</span> '));
      });
    }

  

  });

  (function($) {

$(".toggle-password").click(function() {

    $(this).toggleClass("zmdi-eye zmdi-eye-off");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

})(jQuery);
</script>

@endsection