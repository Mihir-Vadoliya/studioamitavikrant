@extends('layouts.app')

@section('content')
<section class="contact-send-design-section">
  <div class="container-fluid">
      <div class="">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-title">
                  <h3 class="font-40">{{ __('Reset Password') }}</h3>
                </div>
                <div class="">
                  <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                      <div class="form-group mt-4">
                        <label class="fw-bold">Email *</label>              
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="form-group mt-4">
                        <label class="fw-bold">Password *</label>              
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="form-group mt-4">
                        <label class="fw-bold">Confirm Password *</label>              
                        <input type="password" class="form-control" name="password_confirmation">
                      </div>
                      
                       <div class="form-group mt-5">
                        <button class="btn design-btn text-uppercase px-5">Reset Password</button>
                       </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</section>
@endsection
