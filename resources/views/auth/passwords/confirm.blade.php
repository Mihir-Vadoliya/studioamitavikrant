@extends('layouts.app')

@section('content')
<section class="contact-send-design-section">
  <div class="container-fluid">
      <div class="">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-title">
                  <h3 class="font-40">Confirm Password</h3>
                </div>
                <div class="">
                  {{ __('Please confirm your password before continuing.') }}
                  <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                      <div class="form-group mt-4">
                        <label class="fw-bold">Password *</label>              
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      
                       <div class="form-group mt-5">
                        <button class="btn design-btn text-uppercase px-5">Confirm Password</button>
                           @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
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
