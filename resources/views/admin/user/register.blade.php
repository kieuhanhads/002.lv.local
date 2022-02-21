@extends('admin.layout.user.login')
@section('content')
<div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="/" class="h1"><b>Admin</b></a>
      </div>
      <div class="card-body">

        @error('msg')
        <p class="login-box-msg text-danger">{{$message}}</p>
        @enderror
        <form action="{{ route('register') }}" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('name')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password_confirmation')
            <span id="name-error" class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="row">
            <div class="col-8">
              <div class="form-group mb-0 icheck-primary">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="terms" class="custom-control-input @error('terms') is-invalid @enderror" id="agreeTerms" aria-describedby="terms-error">
                  <label class="custom-control-label" for="agreeTerms">Tôi đồng ý <a href="#">điều khoản</a>.</label>
                </div>
                @error('password_confirmation')
                <span id="terms-error" class="error invalid-feedback" style="display: inline;">Bạn chưa đồng ý với điều khoản</span>
                @enderror
            </div>

            </div>
            @csrf
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        {{-- <div class="social-auth-links text-center">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
          </a>
        </div> --}}

        <a href="{{ route('login') }}" class="text-center">Tôi đã có tài khoản</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
@endsection
