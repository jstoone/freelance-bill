
@extends('layouts.master')

@section('content')

<h1>$10</h1>
{{ Form::open(['id' => 'billing-form']) }}

    <div class="form-row">
        <label>
            <span>Email:</span>
            <input type="email" name="email" data-stripe="number"/>
        </label>
    </div>

    <div class="form-row">
        <label>
            <span>Card number:</span>
            <input type="text" data-stripe="number"/>
        </label>
    </div>

    <div class="form-row">
        <label>
            <span>CVC:</span>
            <input type="text" data-stripe="cvc"/>
        </label>
    </div>

    <div class="form-row">
        <label>
            <span>Expiration date:</span>
            {{ Form::selectMonth(null, null , ['data-stripe' => 'exp-month']) }}
            {{ Form::selectYear(null, date('Y'), date('Y') + 15, null, ['data-stripe' => 'exp-year']) }}
        </label>
    </div>
    
    <div class="form-row">
        {{ Form::submit('Submit', ['class' => 'form-control']) }}
    </div>
    <div class="payment-errors" style="display: none;">

    </div>
{{ Form::close() }}
@stop

@section('footer')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/billing.js"></script>
@stop
