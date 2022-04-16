@extends($extends)

@section('content')

    <section class="latest-card-section {{ Auth::user() ? '' : 'pt-80 pb-80' }}">
        <div class="container">
            <div class="g-3 g-sm-4 justify-content-center card-wrapper">
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row justify-content-center my-5">
                            <div class="col-md-12 px-5">
                                @if(session('error_msg'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error_msg') }}
                                    </div>
                                @endif
                                <div class="alert alert-secondary-custom rounded fw-bold fs-4">
                                    <i class="far fa-thumbs-up"></i> You have Selected {{ $card->name }}
                                </div>
                                <form action="{{ route('card.checkOut') }}" method="get" class="row create-card-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $card->id }}">
                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control rounded-0 p-2" name="card_holder_name" id="name" placeholder="Type Name" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="amount">Amount</label>
                                        <input type="number" class="form-control rounded-0 p-2" name="amount" id="name"  placeholder="Type Amount" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bg">Card Color</label>
                                        <select name="bg" id="bg" class="form-control custom-select p-2">
                                            <option value="virtual-bg-morpheusden">Morpheusden</option>
                                            <option value="virtual-bg-sharpblues">Sharpblues</option>
                                            <option value="virtual-bg-fruitblend">Fruitblend</option>
                                            <option value="virtual-bg-deepblue">Deepblue</option>
                                            <option value="virtual-bg-fabledsunset">Fabledsunset</option>
                                            <option value="virtual-bg-newlife">Newlife</option>
                                        </select>
                                    </div>
                                    <div class="my-4 d-flex justify-content-between">
                                        <button class="btn btn--primary rounded">Create Card</button>
                                        <a href="{{ route('card') }}" class="btn btn--danger rounded">Change Card Type</a>
                                    </div>
                                </form>
                                <div class="alert alert-primary-custom rounded fw-bold fs-6">
                                    Issuance Fee : {{__($general->cur_sym)}}{{ $card->card_issuance_fee }} & Loading Fee : ({{__($general->cur_sym)}}{{ $card->card_load_fee }} + {{ $card->card_load_fee_percentage }}%)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


