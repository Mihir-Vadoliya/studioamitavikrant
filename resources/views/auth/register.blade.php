@extends('layouts.app')

@section('content')
<section class="contact-send-design-section">
  <div class="container-fluid">
      <div class="">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-title">
                  <h3 class="font-40">Register</h3>
                </div>
                <div class="">
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="form-group mt-4">
                          <label class="fw-bold">Name *</label>              
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
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
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      
                       <div class="form-group mt-5">
                        <button class="btn design-btn text-uppercase px-5">Register</button>
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
