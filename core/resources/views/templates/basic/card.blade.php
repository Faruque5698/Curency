@extends($extends)

@section('content')

<section class="latest-card-section {{ Auth::user() ? '' : 'pt-80 pb-80' }}">
    <div class="container">
        <div class="row g-3 g-sm-4 justify-content-center card-wrapper">
            @forelse($cards as $singleCard)
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="card-item">
                        @if($singleCard->card->where('user_id', 0)->count() == 0)
                            <div class="discount"></div>
                        @endif
                        <div class="card-thumb">
                                <a href="{{ route('card.details', ['name'=>slug($singleCard->name), 'id'=>$singleCard->id]) }}">
                                <img src="{{ getImage(imagePath()['sub_category']['path'].'/'.$singleCard->image) }}" alt="@lang('card')">
                            </a>
                        </div>
                        <h5 class="title">
                            <a href="{{ route('card.details', ['name'=>slug($singleCard->name), 'id'=>$singleCard->id]) }}">
                                {{ __($singleCard->name) }}
                                <br/>
                                @lang('Available'): {{ $singleCard->card->where('user_id', 0)->count() }}
                            </a>
                        </h5>
                    </div>
                </div>
            @empty
                <h6 class="text-center">@lang('Data Not Found')!</h6>
            @endforelse
        </div>

        {{ $cards->links() }}

    </div>
</section>

@endsection
