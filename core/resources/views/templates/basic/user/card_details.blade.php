@extends($activeTemplate.'layouts.master')
@section('content')

<div class="container">
    <div class="row gy-4 justify-content-center">

        @if($card->image)
            <div class="col-lg-4">
                <div class="card custom--card h-100">
                    <div class="card-header">
                        <h4 class="card-title">@lang('Card Image')</h4>
                    </div>
                    <div class="card-body">
                        <div class="two-factor-content">
                            <div class="two-factor-scan text-center my-4">
                                <img src="{{ getImage(imagePath()['card']['path'].'/'.$card->image, imagePath()['card']['size']) }}" alt="@lang('Image')" class="mw-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-lg-8">
            <div class="card custom--card h-100">
                <div class="card-header">
                    <h4 class="card-title">@lang('Card Details')</h4>
                </div>
                <div class="card-body">
                    <div class="two-factor-content">
                        <h6 class="subtitle text-center">
                            @lang('Category'): {{ __($card->subCategory->category->name) }}
                            <br/>
                            @lang('Sub Category'): {{ __($card->subCategory->name) }}
                        </h6>
                        <p class="two__fact__text">
                            {{ __($card->details) }}
                        </p>
                    </div>
                </div>
            </div>
      </div>

    </div>
  </div>

@endsection

