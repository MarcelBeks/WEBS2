@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Toevoegen nieuw product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('producten-beheren') }}"> <i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
    @if (count($errors) < 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'products.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
        {!! Form::token() !!}
         @include('product.form')
    {!! Form::close() !!}
@endsection