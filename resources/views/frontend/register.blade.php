@extends('frontend.app')
@section('content')


  <div class="main">

<section class="signup">
    <div class="container">
        <div class="signup-content">
        
          

          <form action=" {{ route('register.store')}}" method="POST">
            @csrf 
                <h2 class="form-title">Create student account</h2>
                @if(session('success'))
                <div class="alert mt-2 alert-success">
                    {{ session('success') }}
                </div>
              @endif

                <div class="form-row">
                  <div class="form-group col-md-6 required">
                      <label for="first_name" class="control-label">First Name</label>
                      <input type="text" class="form-input" id="first_name" placeholder="First Name" value="{{ old('first_name') }}" name="first_name" required>
                      @error('first_name')
                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group col-md-6 required">
                      <label for="lastName" class="control-label">Last Name</label>
                      <input type="text" class="form-input" id="last_name" placeholder="Last Name" value="{{ old('last_name') }}" name="last_name" required>
                      @error('last_name')
                          <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                      @enderror
                  </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6 required">
                    <label for="gender" class="control-label">Gender</label>
                    <select class="form-input" id="gender" name="gender" required>
                        <option value="">Select...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    @error('gender')
                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 required">
                    <label for="idBirthCertNo" class="control-label">ID/Birth Certificate No.</label>
                    <input type="text" class="form-input" id="id_birth_cert_no" placeholder="ID/Cert No" value="{{ old('id_birth_cert_no') }}" name="id_birth_cert_no" required>
                    @error('id_birth_cert_no')
                        <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            
            <div class="form-row">
              
              <div class="" style="display:none" >
                  
                  <label for="county" class="control-label">County</label>
                  <select name="county" id="county" class="form-control" required>
                      <option>Select County</option>
                      @foreach ($counties as $county)
                          <option value="{{ $county->name }}" @if(old('county') == $county->name) selected @endif>{{ $county->name }}</option>
                      @endforeach
                  </select>

                  @error('county')
                      <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group  col-md-6  required">
                  <label for="dateOfBirth" class="control-label">Date of Birth</label>
                  <input type="date" class="form-input" id="dateOfBirth" placeholder="DOB" value="{{ old('dateOfBirth') }}" name="dateOfBirth" required>
                  @error('dateOfBirth')
                      <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                  @enderror
              </div>
              <div class="form-group col-md-6 required">
                  <label for="subCounty" class="control-label">Sub County</label>
                  <select name="sub_county" class="form-input" id="subcounty" required>
                      <option value="">Select Subcounty</option>
                  </select>
                  
              </div>
            </div>


             
            <div class="form-row">
              <div class="form-group col-md-6 required">
                  <label for="ward" class="control-label">Ward</label>
                  <select name="ward" class="form-input" id="ward" required>
                      <option value="">Select Ward</option>
                  </select>
            
              </div>
              <div class="form-group col-md-6 required">
                  <label for="location" class="">Location</label>
                  <select name="location" id="location" class="form-input" required>
                      <option value="">Select Location</option>
                  </select>     
                  @error('location')
                    <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                @enderror
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 required">
                <label for="phone_number" class="control-label">Phone Number</label>
                <input type="text" class="form-input" id="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" name="phone_number" required>
                @error('phone_number')
                    <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6 required">
              <label for="email" class="control-label">Email address</label>
              <input type="email" class="form-input" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
              @error('email')
                  <div class="alert alert-danger mb-2 mt-2">{{ $message }}</div>
              @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 required">
              <label for="password" class="control-label">Password</label>
              <input type="password" class="form-input" id="password" placeholder="Password" name="password" required>
              <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
              @error('password')
                  <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group col-md-6 required">
            <label for="c_password" class="control-label">Confirm Password</label>
            <input type="password" class="form-input" id="c_password" placeholder="Confirm Password" name="c_password" required>
            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
            @error('c_password')
                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-group">
          <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
          <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
      </div>
      <p class="loginhere">
        Have already an account ? <a href="{{ route('home')}}" class="loginhere-link">Login here</a>
      </p>

              
              
      <div class="form-group">
          <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/>
      </div>
            </form>
         
        </div>
    </div>

</div>





<style>

.signup {
  font-size: 16px;
  line-height: 1.8;
  color: #222;
  font-weight: 400;
  background-image: url("{{asset('/images/signup-bg.jpg')}}");  background-repeat: no-repeat;
  background-size: cover;
  -moz-background-size: cover;
  -webkit-background-size: cover;
  -o-background-size: cover;
  -ms-background-size: cover;
  background-position: center center;
  padding: 115px 0; 
}



    a:focus, a:active {
  text-decoration: none;
  outline: none;
  transition: all 300ms ease 0s;
  -moz-transition: all 300ms ease 0s;
  -webkit-transition: all 300ms ease 0s;
  -o-transition: all 300ms ease 0s;
  -ms-transition: all 300ms ease 0s; }

input, select, textarea {
  outline: none;
  appearance: unset !important;
  -moz-appearance: unset !important;
  -webkit-appearance: unset !important;
  -o-appearance: unset !important;
  -ms-appearance: unset !important; }

input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
  appearance: none !important;
  -moz-appearance: none !important;
  -webkit-appearance: none !important;
  -o-appearance: none !important;
  -ms-appearance: none !important;
  margin: 0; }

input:focus, select:focus, textarea:focus {
  outline: none;
  box-shadow: none !important;
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  -o-box-shadow: none !important;
  -ms-box-shadow: none !important; }

input[type=checkbox] {
  appearance: checkbox !important;
  -moz-appearance: checkbox !important;
  -webkit-appearance: checkbox !important;
  -o-appearance: checkbox !important;
  -ms-appearance: checkbox !important; }

input[type=radio] {
  appearance: radio !important;
  -moz-appearance: radio !important;
  -webkit-appearance: radio !important;
  -o-appearance: radio !important;
  -ms-appearance: radio !important; }

img {
  max-width: 100%;
  height: auto; }

figure {
  margin: 0; }

p {
  margin-bottom: 0px;
  font-size: 15px;
  color: #777; }

h2 {
  line-height: 1.66;
  margin: 0;
  padding: 0;
  font-weight: 900;
  color: #222;
  font-family: 'Montserrat';
  font-size: 24px;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 40px; }

.clear {
  clear: both; }


.container {
  width: 660px;
  position: relative;
  }

.display-flex {
  justify-content: space-between;
  -moz-justify-content: space-between;
  -webkit-justify-content: space-between;
  -o-justify-content: space-between;
  -ms-justify-content: space-between;
  align-items: center;
  -moz-align-items: center;
  -webkit-align-items: center;
  -o-align-items: center;
  -ms-align-items: center; }

.display-flex-center {
  justify-content: center;
  -moz-justify-content: center;
  -webkit-justify-content: center;
  -o-justify-content: center;
  -ms-justify-content: center;
  align-items: center;
  -moz-align-items: center;
  -webkit-align-items: center;
  -o-align-items: center;
  -ms-align-items: center; }

.position-center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%); }

.signup-content {
  background: #fff;
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
  -o-border-radius: 10px;
  -ms-border-radius: 10px;
  padding: 50px 85px; }

.form-group {
  overflow: hidden;
  margin-bottom: 20px; }

.form-input {
  width: 100%;
  border: 1px solid #ebebeb;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  padding: 17px 20px;
  box-sizing: border-box;
  font-size: 14px;
  font-weight: 500;
  color: #222; }
  .form-input::-webkit-input-placeholder {
    color: #999; }
  .form-input::-moz-placeholder {
    color: #999; }
  .form-input:-ms-input-placeholder {
    color: #999; }
  .form-input:-moz-placeholder {
    color: #999; }
  .form-input::-webkit-input-placeholder {
    font-weight: 500; }
  .form-input::-moz-placeholder {
    font-weight: 500; }
  .form-input:-ms-input-placeholder {
    font-weight: 500; }
  .form-input:-moz-placeholder {
    font-weight: 500; }
  .form-input:focus {
    border: 1px solid transparent;
    -webkit-border-image-source: -webkit-linear-gradient(to right, #9face6, #74ebd5);
    -moz-border-image-source: -moz-linear-gradient(to right, #9face6, #74ebd5);
    -o-border-image-source: -o-linear-gradient(to right, #9face6, #74ebd5);
    border-image-source: linear-gradient(to right, #9face6, #74ebd5);
    -webkit-border-image-slice: 1;
    border-image-slice: 1;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    background-origin: border-box;
    background-clip: content-box, border-box; }
    .form-input:focus::-webkit-input-placeholder {
      color: #222; }
    .form-input:focus::-moz-placeholder {
      color: #222; }
    .form-input:focus:-ms-input-placeholder {
      color: #222; }
    .form-input:focus:-moz-placeholder {
      color: #222; }

.form-submit {
  width: 100%;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  padding: 17px 20px;
  box-sizing: border-box;
  font-size: 14px;
  font-weight: 700;
  color: #fff;
  text-transform: uppercase;
  border: none;
  background-image: -moz-linear-gradient(to left, #74ebd5, #9face6);
  background-image: -ms-linear-gradient(to left, #74ebd5, #9face6);
  background-image: -o-linear-gradient(to left, #74ebd5, #9face6);
  background-image: -webkit-linear-gradient(to left, #74ebd5, #9face6);
  background-image: linear-gradient(to left, #74ebd5, #9face6); }

input[type=checkbox]:not(old) {
  width: 2em;
  margin: 0;
  padding: 0;
  font-size: 1em;
  display: none; }

input[type=checkbox]:not(old) + label {
  display: inline-block;
  margin-top: 7px;
  margin-bottom: 25px; }

input[type=checkbox]:not(old) + label > span {
  display: inline-block;
  width: 13px;
  height: 13px;
  margin-right: 15px;
  margin-bottom: 3px;
  border: 1px solid #ebebeb;
  border-radius: 2px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  -o-border-radius: 2px;
  -ms-border-radius: 2px;
  background: white;
  background-image: -moz-linear-gradient(white, white);
  background-image: -ms-linear-gradient(white, white);
  background-image: -o-linear-gradient(white, white);
  background-image: -webkit-linear-gradient(white, white);
  background-image: linear-gradient(white, white);
  vertical-align: bottom; }

input[type=checkbox]:not(old):checked + label > span {
  background-image: -moz-linear-gradient(white, white);
  background-image: -ms-linear-gradient(white, white);
  background-image: -o-linear-gradient(white, white);
  background-image: -webkit-linear-gradient(white, white);
  background-image: linear-gradient(white, white); }

input[type=checkbox]:not(old):checked + label > span:before {
  content: '\f26b';
  display: block;
  color: #222;
  font-size: 11px;
  line-height: 1.2;
  text-align: center;
  font-family: 'Material-Design-Iconic-Font';
  font-weight: bold; }

.label-agree-term {
  font-size: 12px;
  font-weight: 600;
  color: #555; }

.term-service {
  color: #555; }

.loginhere {
  color: #555;
  font-weight: 500;
  text-align: center;
  margin-top: 91px;
  margin-bottom: 5px; }

.loginhere-link {
  font-weight: 700;
  color: #222; }

.field-icon {
  float: right;
  margin-right: 17px;
  margin-top: -32px;
  position: relative;
  z-index: 2;
  color: #555; }

@media screen and (max-width: 768px) {
  .container {
    width: calc(100% - 40px);
    max-width: 100%; } }
@media screen and (max-width: 480px) {
  .signup-content {
    padding: 50px 25px; } }
</style>













  </section>
  <script>

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


        var thecounties = @json($counties);
        var thesubcounties = @json($subCounties);
        var thewards = @json($wards);
        var thelocations = @json($locations);
        console.log(thelocations);

        // Check the type of the first county's id
        console.log(typeof thelocations[0].id);

        



        var countySelect = document.getElementById('county');
        var subcountySelect = document.getElementById('subcounty');
        var wardSelect = document.getElementById('ward');
        var locationSelect = document.getElementById('location');

        document.addEventListener("DOMContentLoaded", function() {
                var selectedCounty = thecounties.find(function(county) {
                    return county.id === "xuFdFy6t9AH";
                });
                countySelect.value = selectedCounty.name;
                countySelect.disabled = true;
                countySelect.dispatchEvent(new Event('change'));
            });

            countySelect.addEventListener('change', function() {
                var selectedCounty = countySelect.value;
                subcountySelect.innerHTML = '<option value="">Select Subcounty</option>';
                wardSelect.innerHTML = '<option value="">Select Ward</option>';
                if (selectedCounty) {
                    var county = thecounties.find(function(county) {
                        return county.name === selectedCounty;
                    });
                    var subcounties = @json($subCounties);

                    console.log(county.id);
                    var subcounties = subcounties.filter(function(subcounty) {
                        return subcounty.county_id === county.id;
                    });
                    subcounties.forEach(function(subcounty) {
                        var option = document.createElement('option');
                        option.value = subcounty.name;
                        option.innerHTML = subcounty.name;
                        subcountySelect.appendChild(option);
                    });
                }
         });
        
        
        subcountySelect.addEventListener('change', function() {
            var selectedSubcounty = subcountySelect.value;
            wardSelect.innerHTML = '<option value="">Select Ward</option>';
            if (selectedSubcounty) {
                var subcounty = thesubcounties.find(function(subcounty) {
                    return subcounty.name === selectedSubcounty;
                });
                var wards = @json($wards);
                var wards = wards.filter(function(ward) {
                    return ward.sub_county_id === subcounty.id;
                });
                wards.forEach(function(ward) {
                    var option = document.createElement('option');
                    option.value = ward.id;
                    option.innerHTML = ward.name;
                    wardSelect.appendChild(option);
                });
            }
        });
        wardSelect.addEventListener('change', function() {
            var selectedWard = wardSelect.value;
            locationSelect.innerHTML = '<option value="">Select Location</option>';
            if (selectedWard) {
                var ward = thewards.find(function(ward) {
                    return ward.id == selectedWard;  // Use == to allow type coercion
                });
                var locations = @json($locations);
                var locations = locations.filter(function(location) {
                    return location.ward_id === ward.id;
                });
                locations.forEach(function(location) {
                    var option = document.createElement('option');
                    option.value = location.id;
                    option.innerHTML = location.name;
                    locationSelect.appendChild(option);
                });
            }
        });

    </script>
@endsection