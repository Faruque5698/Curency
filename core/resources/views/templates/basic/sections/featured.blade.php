@php
    $featured = getContent('featured.content', true);
    $featuredCards = App\Models\Category::with('subCategory')
                                        ->where('featured', 1)
                                        ->where('status', 1)
                                        ->latest()
                                        ->take(12)
                                        ->get();
    $plans = \App\Models\Plan::where('status', 1)->get();
@endphp
<!-- Featured Card Section -->
<section class="top-selling-card-section bg--section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-xxl-6">
                <div class="section__header text-center">
                    <span class="section__category">
                        {{ __(@$featured->data_values->title) }}
                    </span>
                    <h3 class="section__title">
                        {{ __(@$featured->data_values->heading) }}
                    </h3>
                    <p>
                        {{ __(@$featured->data_values->sub_heading) }}
                    </p>
                </div>
            </div>
        </div>
{{--        <div class="card-slider owl-theme owl-carousel">--}}
{{--            @foreach($featuredCards as $featuredCard)--}}
{{--                <div class="card-item">--}}
{{--                    <div class="card-thumb">--}}
{{--                        <a href="{{ route('category', ['name'=>slug($featuredCard->name), 'id'=>$featuredCard->id]) }}">--}}
{{--                            <img src="{{ getImage(imagePath()['category']['path'].'/'.$featuredCard->image) }}" alt="@lang('card')">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <h5 class="title">--}}
{{--                        <a href="{{ route('category', ['name'=>slug($featuredCard->name), 'id'=>$featuredCard->id]) }}">--}}
{{--                            {{ __($featuredCard->name) }}--}}
{{--                        </a>--}}
{{--                    </h5>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
        <div class="row g-3 g-sm-4 justify-content-center card-wrapper">
            @forelse($plans as $plan)
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="plan-item">
                        <div class="name">
                            <h5 class="text-white">{{ $plan->name }}</h5>
                        </div>
                        <div class="plan-feature">
                            <span>{{__($general->cur_sym)}}{{ $plan->card_issuance_fee }} / Issuance Fee</span>
                        </div>
                        <div class="plan-feature">
                            <span class="text-warning">@if($plan->funding == 1) Reloadable @else Non Reloadable @endif </span> Card
                        </div>
                        <div class="plan-feature">
                            <span>Load Fee ({{__($general->cur_sym)}}{{ $plan->card_load_fee }}+{{ $plan->card_load_fee_percentage }}%)</span>
                        </div>
                        <div class="plan-feature">
                            <span>Min Load {{__($general->cur_sym)}}{{ $plan->min_load }}</span>
                        </div>
                        <div class="plan-feature">
                            <span>Max Load {{__($general->cur_sym)}}{{ $plan->max_load }}</span>
                        </div>
                        <div class="plan-feature">
                            <span>Validity 4 Years</span>
                        </div>
                        <div class="plan-feature">
                            <span> No Monthly Fees</span>
                        </div>
                        <div class="my-4 t">
                            <a href="{{ route('card.select', ['id'=>$plan->id]) }}" class="btn btn--primary">
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <h6 class="text-center">@lang('Data Not Found')!</h6>
            @endforelse
        </div>
    </div>
</section>
<!-- Featured Card Section -->
