@extends('frontend.app')
@section('content')
    <!-- slider section -->
    <section class="slider_section " >
      
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
    
        <div class="carousel-inner"   >
          <div class="carousel-item active" >
            <div class="container-fluid" >
              <div class="row" >
                <div class="col-md-5 offset-md-1"  style="background-image: url('{{ asset('images/kenya.png')}}');">
                  <div class="detail-box">
                    <h1 class="text-center mb-4">
                     {{$latestOpenApplication->name ?? 'No Open Bursary Applications Available'}}
                    </h1>
                    <div class="rounded bg-gradient-4 text-white shadow p-5 text-center mb-5" style="background-color: #1cbbb4;">
                      <p class="mb-0 font-weight-bold text-uppercase text-black">Applications Close in </p>
                      <div id="clock-c" class="countdown py-4"></div>
                    </div>

        
                    <div class="btn-box">
                      <a href="{{ route('bursary.application', ['id' => $latestOpenApplication->id]) }}" class="btn-1">
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
                  </div>
                </div>
               
          
                <div class="offset-md-1 col-md-4 img-container" >
                  @if (!Auth::check())
                  <div class="form-inner pb-4">
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
                      </div>
                      <button type="submit" class="login-button mb-4">Log In</button>
                    </form>
                  </div>
                  @endif

                  @if (Auth::check())
                    <div class="img-box">
                      <img src="images/slider-img.png" alt="">
                    </div>
                  @endif
              </div>
              
              </div>
            </div>
          </div>
          </div>
          

      </div>

    </section>
    <!-- end slider section -->
  </div>

  <style>
    .countdown {
text-transform: uppercase;
font-weight: bold;
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
  background: rgba(26, 46, 53, 0.5); /* Adjust the alpha value (0.0 to 1.0) for desired transparency */
  padding-top: 16.36vh;
  padding-left: 4vw;
  padding-right: 4vw;
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
    var deadlineDate = '{{$latestOpenApplication->deadline}}'; 
    
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
          + '<span class="h1 font-weight-bold">%D</span> Day%!d'
          + '<span class="h1 font-weight-bold">%H</span> Hr'
          + '<span class="h1 font-weight-bold">%M</span> Min'
          + '<span class="h1 font-weight-bold">%S</span> Sec'));
      });
    }

  

  });
</script>


@endsection


  

