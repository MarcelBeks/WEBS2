@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('cart'))
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Product</th>
                <th scope="col">Aantal</th>
                <th scope="col">Prijs</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td><img src="{{ asset('/storage/images/products/' . $product['item']['image']) }}" height="50px"></img</td>
                    <td>{{ $product['item']['name'] }}</td>
                    <td>
                        <a href="{{ route('product.reduce', ['id' => $product['item']['id']]) }}"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                        <strong>{{ $product['qty'] }}</strong>
                        <a href="{{ route('cart.add', ['id' => $product['item']['id']]) }}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                    </td>
                    <td>€{{number_format((float)$product['price'], 2, '.', '')}}</td>
                    <td class="text-right"><a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <div class="row text-right">                
            <div class="col">
                <strong>Totaal: €{{number_format((float)$totalPrice, 2, '.', '')}}</strong>
            </div>   
        </div>
        <hr>
        <div class="row text-right">                
            <div class="col">
                <a href="{{ route('order.create', ['redirectToPay' => true]) }}" class="btn btn-success"><i class="fa fa-credit-card" aria-hidden="true"></i> Betalen</a>
            </div>   
        </div>
    @else
    <div class="row">                
            <h2>Geen producten in winkelwagen</h2>   
        </div>
    @endif
</div>
@endsection
