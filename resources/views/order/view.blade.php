@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order bekijken #{{ $order->id }}</h1>
        <hr>
        <div class="row">
            <div class="col-md-2">
                <b>Id: <br/>
                Datum: <br/>
                Tijd: <br/>
                Totaal prijs: <br/>
                Betaald: <br/>
                Producten: <br/> </b>
            </div>
            <div class="col">
                {{ $order->id }} <br/>
                {{ date('d-m-Y', strtotime($order->created_at)) }} <br/>
                {{ date('H:i', strtotime($order->created_at)) }} <br/>
                &euro;{{ $order->total_price }} <br/>
                @if ($order->paid) Ja @else Nee @endif
            </div>
        </div>
        <hr>
        <div class="row">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" width="10%">Foto</th>
                            <th scope="col">Naam</th>
                            <th scope="col">Aantal</th>
                            <th scope="col">Prijs</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderitems as $item)
                            <tr>
                                <th scope="row"><img class="img-fluid" src="{{ asset('/storage/images/products/' . $item->product->image) }}" alt="product"/></th>
                                <th class="align-middle"><a href="{{ route('product.view', ['id' => $item->product->id]) }}">{{ $item->product->name }}</a></th>
                                <th class="align-middle">{{ $item->amount }}</th>
                                <th class="align-middle">&euro;{{ $item->price }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
