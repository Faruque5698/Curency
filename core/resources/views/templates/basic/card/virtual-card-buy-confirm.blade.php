@extends($extends)

@section('content')

    <section class="latest-card-section {{ Auth::user() ? '' : 'pt-80 pb-80' }}" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div class="g-3 g-sm-4 justify-content-center card-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border-0">
                            <div class="card-header bg-white text-dark p-4 rounded-top">
                                <h5>Create Virtual Card Instantly</h5>
                            </div>
                            <div class="card-body p-4">
                                @if(session('error_msg'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error_msg') }}
                                    </div>
                                @endif

                                <form action="{{ route('card.confirm') }}" method="post" class="create-card-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $card->id }}">
                                    <input type="hidden" name="card_holder_name" value="{{ $card_holder_name }}">
                                    <input type="hidden" name="amount" value="{{ $amount }}">
                                    <input type="hidden" name="bg" value="{{ $bg }}">
                                    <input type="hidden" name="temp_id" value="{{ 'tempId-'. Auth::user()->id . time() . rand(6, 100) }}">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="alert alert-secondary-custom rounded fw-bold fs-4">
                                                <i class="far fa-thumbs-up"></i> You have Selected {{ $card->name }}
                                            </div>
                                            <div class="form-group">
                                                <label> Card holder name : </label>
                                                <input type="text" value="{{ $card_holder_name }}" class="form-control bg-white p-2 text-muted" readonly>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                                    <strong>Plan Name :</strong>
                                                    <strong>{{ $card->name }}</strong>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                                    <strong>Issuance Fee :</strong>
                                                    <strong>{{__($general->cur_sym)}}{{ $card->card_issuance_fee }}</strong>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                                    <strong>Card Load Amount :</strong>
                                                    <strong>{{__($general->cur_sym)}}{{ $amount }}</strong>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                                    <strong>Load Fee :</strong>
                                                    <strong>({{__($general->cur_sym)}}{{ $card->card_load_fee }} + {{ $card->card_load_fee_percentage }}%)</strong>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center active py-3" aria-current="true">
                                                    <strong>Total</strong>
                                                    <strong> {{__($general->cur_sym)}}{{ $total_amount }}</strong>
                                                </li>
                                            </ul>
                                            <div class="my-4 d-flex flex-column flex-md-row justify-content-between">
                                                <button class="btn btn--primary rounded mb-2 mb-md-0 py-2">Confirm</button>
                                                <a href="{{ route('card') }}" class="btn btn--danger btn-block w-md-50 ml-2 rounded py-2">Change Card Type</a>
                                            </div>
                                        </div>
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


