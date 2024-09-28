<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{asset('backend/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/dist/css/adminlte.min.css')}}">

@php
$setting = DB::table('settings')->first();  
@endphp

<div class="hold-transition login-page">
 <div class="login-box">
    <div class="card">
      <div class="card-body login-card-body">
        <div class="login-logo">
            <a href="/login">  <img src="{{ (!empty($setting->images)) ? url('backend/all-images/web/logo/'.$setting->images): url('backend/all-images/web/default/loader.png') }}" alt="" class="brand-image" height="100px" width="180px"><br/></a>
          </div>
          <p class="login-box-msg text-danger">Use your email and password to Login</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
        <div class="col-12" align="right">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        </div>
        </form>
        <div align="center">
          <p class="">Don't have an account? <a href="{{route('register')}}">SIGN UP</a> </p>
          </div>
      </div>
    </div>
  </div>
</div>


