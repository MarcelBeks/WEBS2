@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        <a href="{{ url('/home') }}">Home</a> > <a href="{{ url('category/'.$product->category->name) }}">{{$product->category->name}}</a> > <span>{{$product->subcategory->name}}</span> > <a href="{{ $product->id }}">{{$product->name}}</a>
        <hr>
                <div class="panel panel-default">

                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('/storage/images/products/' . $product->image) }}" />
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-6">
                                <h1>{{$product->name}}</h1>
                                <br />
                                <div class="row">
                                    <div class="col-md-2">
                                        <strong>Prijs: </strong><br>
                                        <strong>Categorie: </strong><br>
                                        <strong>Subategorie: </strong><br>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-4 text-left">
                                        <span>€{{number_format((float)$product->price, 2, '.', '')}}</span><br>
                                        <span>
                                            <?php foreach($cat as $c){
                                                    echo $c->name; 
                                                } 
                                            ?>
                                        </span><br>
                                        <span>
                                            <?php foreach($subCat as $sc){
                                                    echo $sc->name; 
                                                } 
                                            ?>
                                        </span><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 text-left">
                                            <a href="{{ route('cart.add', ['id' => $product->id]) }}"><button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> Bestel</button></a>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Product omschrijving</h3>
                            <p>{{$product->desc}}</p>
                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>
@endsection
