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
            <form class="account-form row g-4" action="{{ route('user.password.verify.code') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="col-md-12">
                    <label for="code" class="form--label">@lang('Verification Code')</label>
                    <input id="code" type="text" class="form-control form--control" name="code" required required>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="cmn--btn btn--lg w-100 justify-content-center">@lang('Verify Code')</button>
                </div>

                <div class="col-md-12">
                    @lang('Check including your Junk/Spam Folder. if not found, you can')
                    <a href="{{ route('user.password.request') }}" class="text--base">
                        @lang('Try to send again')
                    </a>
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
