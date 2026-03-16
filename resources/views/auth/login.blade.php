@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                @include('flash-message')


                <div class="card">
                    <div class="card-header text-center bg-success text-white float-center">
                        {{ __('Welcome Back Login to Proceed') }}</div>

                    <div class="card-body">
                        <center>
                            <div class="float-center">
                                <img src="{{ asset('assets/images/laikipia.png')}}" style="width:100px; height: 100px;">
                            </div>
                        </center>
                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf

                            <div class="">
                                <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 ml-1">
                                <div class="row">
                                    <div class="form-check col-6">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    <div class="col-6">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 ">



                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 text-center ">
                                    <button type="submit" class="col-5 btn btn-success ">
                                        {{ __('Login') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
