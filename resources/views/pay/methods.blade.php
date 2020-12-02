@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Kies een betaalmethode:</h1>
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-2 offset-md-5">
        <a href="{{ route('pay', ['order_id' => $orderid]) }}"><img class="img img-thumbnail" src="/images/ideal.png" alt="ideal"/></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 offset-md-5">
            <a href="{{ route('pay', ['order_id' => $orderid]) }}"><img class="img img-thumbnail" src="/images/paypal.png" alt="paypal"/></a>
        </div>
    </div>
</div>
@endsection
