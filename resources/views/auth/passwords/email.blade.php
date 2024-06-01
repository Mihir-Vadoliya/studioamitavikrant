@extends('layouts.app')

@section('content')
<section class="contact-send-design-section">
  <div class="container-fluid">
      <div class="">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-title">
                  <h3 class="font-40">Reset Password</h3>
                </div>
                <div class="">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                  <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                      <div class="form-group mt-4">
                        <label class="fw-bold">Email *</label>              
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      
                       <div class="form-group mt-5">
                        <button class="btn design-btn text-uppercase px-5">Send Password Reset Link</button>
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
