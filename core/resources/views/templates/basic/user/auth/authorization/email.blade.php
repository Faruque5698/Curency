@extends($activeTemplate .'layouts.auth_master')

@php
    $bgImage = getContent('authentication.content', true);
@endphp

@section('content')

<!-- Account Section Starts Here -->
<div class="account-section bg-img" style="background-image: url( {{ getImage('assets/images/frontend/authentication/' .@$bgImage->data_values->image, '1920x1080') }} );">
    <div class="left">
        <div class="left-inner w-100">
            <div class="logo text-center mb-lg-5 mb-4">
                <a href="{{ route('home') }}">
                    <img src="" alt="@lang('logo')">
                </a>
            </div>
            <form class="account-form row g-4" action="{{route('user.verify.email')}}" method="POST">
                @csrf
                <div class="col-md-12 text-center">
                    <label for="username" class="form--label">@lang('Your Email'):
                        <strong>{{auth()->user()->email}}</strong>
                    </label>
                </div>
                <div class="col-md-12">
                    <label for="code" class="form--label">@lang('Verification Code')</label>
                    <input type="text" name="email_verified_code" class="form-control form--control" maxlength="7" id="code">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="cmn--btn btn--lg w-100 justify-content-center">@lang('Submit')</button>
                </div>

                <div class="col-md-12">
                    @lang('Please check including your Junk/Spam Folder. if not found, you can')
                    <a href="{{route('user.send.verify.code')}}?type=email" class="text--base">
                        @lang('Resend code')
                    </a>

                    @if($errors->has('resend'))
                        <br/>
                        <small class="text-danger">{{ $errors->first('resend') }}</small>
                    @endif

                </div>

            </form>
        </div>
    </div>
</div>
<!-- Account Section Ends Here -->

@endsection


@push('script')
<script>
    (function($){
        "use strict";
        $('#code').on('input change', function () {
          var xx = document.getElementById('code').value;

              $(this).val(function (index, value) {
                 value = value.substr(0,7);
                  return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
              });

      });
    })(jQuery)
</script>
@endpush
