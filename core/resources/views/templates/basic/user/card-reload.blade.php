@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-4">
                <h3 class="text-center mb-3">Reload To {{ $card->name_on_card }}</h3>
                <p class="text-center mb-3">Card No: {{ $card->card_pan }}</p>
                <div class="reload bg-white rounded p-5">
                    <form action="{{ route('user.card.reload.confirm') }}" class="form-inline" method="post">
                        @csrf
                        <input type="hidden" id="card_load_fee" value="{{ $plan->card_load_fee }}">
                        <input type="hidden" id="card_load_fee_percentage" value="{{ $plan->card_load_fee_percentage }}">
                        <input type="hidden" name="id" value="{{ $card->id }}">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            @php($plan = \App\Models\Plan::find($card->plan_id))
                            <input name="amount" type="number" min="{{ $plan->min_load }}" max="{{ $plan->max_load }}" class="form-control" id="amount" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input name="total" type="text" readonly class="form-control" id="total">
                            <small>Loading Fee: ({{ __($general->cur_sym) }}{{ $plan->card_load_fee }} + {{ $plan->card_load_fee_percentage }}%) </small>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn--primary">Reload Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
            $('#amount').on('keyup', function (){
                let value = $(this).val();
                let card_load_fee = Number($('#card_load_fee').val())
                let card_load_fee_percentage = Number($('#card_load_fee_percentage').val())

                let total_with_load = Number(value) + card_load_fee;
                let total_with_load_per = (total_with_load / 100) * card_load_fee_percentage;
                let total = total_with_load_per + total_with_load;
                if (value > 0) {
                    $('#total').val(total);
                }else {
                    $('#total').val('');
                }
            });

    </script>
@endpush

