@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="d-flex flex-column flex-md-row justify-content-between flex-wrap">
                    <form action="{{ route('user.card.transactionFilter') }}" method="get" class="d-flex flex-column flex-md-row  flex-wrap">
                        <input type="hidden" name="card_id" value="{{ $transaction_id }}">
                        <div class="form-group mb-1 me-md-2">
                            <input type="text" class="form-control datepicker-here bg-white text-dark" data-language="en" name="start_date" value="{{ date('m/d/Y', strtotime($start_date)) }}" placeholder="Star Date" autocomplete="off">
                        </div>
                        <div class="form-group mb-1 me-md-2">
                            <input type="text" class="form-control datepicker-here bg-white text-dark" data-language="en" name="end_date" value="{{ date('m/d/Y', strtotime($end_date)) }}" placeholder="End Date" autocomplete="off">
                        </div>
                        <div class="form-group mb-1 me-md-2">
                            <button type="submit" class="btn btn--primary w-100 box--shadow1 text--small">Filter</button>
                        </div>
                    </form>
                    <a href="{{ route('user.card') }}" class="btn btn--primary box--shadow1 text--small addNew mb-1">
                        <i class="las la-table"></i>
                        @lang('My Cards')
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="table-responsive--md table-responsive bg-white p-4">
                    <table class="table table--light style--two">
                        <thead>
                        <tr>
                            <th>@lang('SL')</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                        </thead>
                        @php($i = 1)
                        <tbody>
                        @if(isset($transaction->data) && count($transaction->data))
                            @foreach($transaction->data as $row)
                                @if($row->product != 'Card Issuance Fee')
                                    @if($row->gateway_reference_details != 'Card Withdrawal ')
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->amount }} {{ $row->currency }}</td>
                                            <td>{{ $row->gateway_reference_details }}</td>
                                            <td>{{ $row->status }}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($row->created_at)) }}</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6"> Not Found</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('script')
    <script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>

    <script>
        (function($){
            "use strict";
            if(!$('.datepicker-here').val()){
                $('.datepicker-here').datepicker();
            }
        })(jQuery)
    </script>
@endpush

