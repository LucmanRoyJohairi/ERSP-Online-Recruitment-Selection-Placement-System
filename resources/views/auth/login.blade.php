@extends('layouts.app')
@section('style')

<link href="{{ asset('applicant/css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
<!--login-->
<section id="login" class="bodyContents-section -bg-light py-6">
    <div class="container">
      <div class="row">
        <div class="col-md-5 order-2 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
          <h3>
            Sign in to your <br>
            USTP eRSP account
          </h3>
          <form method="POST" action="{{ route('login') }} " id="login-form">
            @csrf
            <hr class="my-4">
            <div class="m-input-container">
              <label class="label" for="emailnumber">Email address</label> 
              <input id="email" type="email" autocomplete="off"  name="email" class="input-text form-control ng-pristine @error('email') is-invalid @enderror"  value="{{ old('email') }}">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
               
            </div><br>
            <div class="m-input-container">
              <label class="label" for="password">Password</label>
              <input id="password" type="password"  name="password" autocomplete="current-password" class="input-text form-control ng-pristine @error('password') is-invalid @enderror">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <p class="mb-4">
              <!-- <small class="text-muted">Forgot password?<a href="#" class=""> Click here.</a></small> -->
            </p>
            <button input type="submit" class="btn btn-lg btn-block" id="sign-in-btn">Sign in</button>
            <p class="text-center">
              <small class="text-muted">Don't have an account yet? <a href="{{ route('register') }}" class="">Click here.</a></small>
            </p>
          </form>
        </div>
        <div class="col-md-6 order-1 d-flex align-items-center wow fadeInUp" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
          <img src="{{ asset('applicant/img/login2.png') }}" alt="" class="img-fluid">
        </div>
      </div>
    </div>
 </section>
@endsection

