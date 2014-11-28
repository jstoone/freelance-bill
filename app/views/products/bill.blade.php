
@extends('layouts.master')

@section('content')
<div id="products-bill" class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Payment details for:</h3>
            <h4>{{ $product->name }}</h4>
        </div>
        <div class="panel-body">
            <h4>Total price: <span class="pull-right">{{ $product->present()->price }}</span></h4>
            <hr/>
            {{ Form::open(['route' => ['products.bill', $product->slug], 'id' => 'billing-form']) }}
                <div class="form-group">
                    <div class="payment-errors alert alert-danger" style="display: none;"></div>

                    <label class="control-label">Card number: </label>
                    <input class="form-control" type="text" data-stripe="number"/>

                    <div class="row">
                        <div class="col-md-7">
                            <label class="control-label">Expiration date:</label>
                            <div class="row">
                                <div class="col-md-6">
                                    {{ Form::selectMonth(null, null , [
                                        'data-stripe' => 'exp-month',
                                        'class' => 'form-control'
                                    ]) }}
                                </div>
                                <div class="col-md-6">
                                    {{ Form::selectYear(null, date('Y'), date('Y') + 15, null, [
                                        'data-stripe' => 'exp-year',
                                        'class' => 'form-control'
                                    ]) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label class="control-label">CVC</label>
                            <input class="form-control" type="text" data-stripe="cvc"/>
                        </div>
                    </div>
                    <hr/>
                    {{ Form::submit('Submit', ['class' => 'btn btn-success form-control']) }}

                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop

@section('footer')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="/js/billing.js"></script>
@stop
