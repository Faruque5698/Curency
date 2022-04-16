@extends($activeTemplate.'layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center g-4">
        <div class="col-xxl-6 col-xl-8 col-lg-6">
            <div class="deposit-item">
                <div class="deposit-thumb">
                    <img src="{{ $data->gatewayCurrency()->methodImage() }}" alt="@lang('image')">
                </div>
                <div class="deposit-content fs-sm">
                    <ul>
                        <li>
                            @lang('Amount'):
                            <strong>{{showAmount($data->amount)}} </strong> {{__($general->cur_text)}}
                        </li>
                        <li>
                            @lang('Charge'):
                            <strong>{{showAmount($data->charge)}}</strong> {{__($general->cur_text)}}
                        </li>
                        <li>
                            @lang('Payable'):
                            <strong> {{showAmount($data->amount + $data->charge)}}</strong> {{__($general->cur_text)}}
                        </li>
                        <li>
                            @lang('Conversion Rate'):
                            <strong>1 {{__($general->cur_text)}} = {{showAmount($data->rate)}}  {{__($data->baseCurrency())}}</strong>
                        </li>
                        <li>
                            @lang('In') {{$data->baseCurrency()}}:
                            <strong>{{showAmount($data->final_amo)}}</strong>
                        </li>
                    </ul>
                    <div class="mt-30">
                        @if( 1000 >$data->method_code)
                            <a href="{{route('user.deposit.confirm')}}" class="cmn--btn w-100 justify-content-center">
                                @lang('Pay Now')
                            </a>
                        @else
                            <a href="{{route('user.deposit.manual.confirm')}}" class="cmn--btn w-100 justify-content-center">
                                @lang('Pay Now')
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


