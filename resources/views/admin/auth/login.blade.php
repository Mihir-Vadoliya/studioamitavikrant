@extends('admin.layouts.app')

@section('content')

<div class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>{{ env("APP_NAME")}}</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form id="adminLoginForm" method="post" action="{{ route('doLogin') }}" class="row justify-content-center">
                    @csrf
                    <div class="col-12 col-md-10 col-lg-6 col-xl-12 mb-2">
                        @error('error')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-10 col-lg-6 col-xl-12 mb-4">
                        <input value="{{ old('email') }}" name="email" id="email" type="email" placeholder="Username"
                               class="form-control login_field ">
                    </div>
                    <div class="col-12 col-md-10 col-lg-6 col-xl-12 mb-3">
                        <input name="password" id="password" type="password" placeholder="Password"
                               class="form-control login_field ">
                    </div>
                    <div class="col-12 col-md-10 col-lg-6 col-xl-12 mb-4">
                        <a href="{{ route('adminForgotPassword') }}" class="login_field font-16 border-0 text-decoration-none">Forgot
                            Password?</a>
                    </div>
                    <div class="col-12 col-md-10 col-lg-6 col-xl-12">
                        <button class="btn btn-outline-success login_btn_1 w-100" type="submit">Login
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>        
</div>

@endsection
