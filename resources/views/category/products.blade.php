@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col">
                @if(!Empty($cat))
                    <a href="{{ url('/home') }}">Home</a> > <a href="{{ url('category/'.$cat) }}">{{$cat}}</a>
                @else
                    <a href="{{ url('/home') }}">Home</a>
                @endif
                <hr>
            <div class="panel panel-default">

                @if(count($products) > 0)
                <div class="panel panel-body">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-4">
                                    <div class="col-md-12 border border-dark">
                                        <a href="{{url('product/' . $product->id)}}"><div class="imageHolder"><img src="{{ asset('/storage/images/products/' . $product->image) }}" /></div>                                
                                        <p>{{$product->name}}</p></a>
                                        <p>€{{number_format((float)$product->price, 2, '.', '')}}</p></a>
                                        <a href="{{ route('cart.add', ['id' => $product->id]) }}"><button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> Bestel</button></a>
                                    </div>                                                                                
                                </div>
                            @endforeach
                        </div>
                    </div>
            @else
                <div class="panel-body">
                    <p>Geen producten gevonden</p>
                </div>
            @endif

            </div>
        </div>
    </div>
</div>
@endsection
