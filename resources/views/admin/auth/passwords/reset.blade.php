@extends('admin.layouts.app')

@section('content')
<div class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>{{ env("APP_NAME")}}</b></a>
            </div>
            <div class="card-body">
                <h3 class="login-box-msg">Reset Password</h3>
                <form id="adminLoginForm" method="post" action="{{ route('adminResetPassword') }}" class="row justify-content-center">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="col-12 col-md-10 col-lg-6 col-xl-12 mb-2">
                        @error('errors')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-10 col-lg-6 col-xl-12 mb-4">
                        <input value="{{ old('email') }}" name="email" id="email" type="email" placeholder="Email" class="form-control login_field ">
                    </div>
                    <div class="col-12 col-md-10 col-lg-6 col-xl-12 mb-4">
                        <input name="password" id="password" type="password" placeholder="password" class="form-control login_field">
                    </div>
                    <div class="col-12 col-md-10 col-lg-6 col-xl-12 mb-4">
                        <input name="password_confirmation" id="password_confirmation" type="password" placeholder="new-password" class="form-control login_field ">
                    </div>
                    <div class="col-12 col-md-10 col-lg-6 col-xl-12">
                        <button class="btn btn-outline-success login_btn_1 w-100" type="submit">Reset Password
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>        
</div>
@endsection
