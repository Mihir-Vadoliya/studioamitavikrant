@extends('layouts.app')

@section('content')
<section class="contact-send-design-section">
  <div class="container-fluid">
      <div class="">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-title">
                  <h3 class="font-40">{{ __('Verify Your Email Address') }}</h3>
                </div>
                <div class="">
                  @if (session('reset'))
                      <div class="alert alert-success" role="alert">
                          {{ __('A fresh verification link has been sent to your email address.') }}
                      </div>
                  @endif

                  {{ __('Before proceeding, please check your email for a verification link.') }}
                  {{ __('If you did not receive the email') }},
                  <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                       <div class="form-group mt-5">
                        <button class="btn design-btn text-uppercase px-5">{{ __('click here to request another') }}</button>
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
