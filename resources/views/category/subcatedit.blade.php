@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Subcategorie aanpassen</h2>
            </div>
            <div class="pull-right">
               <a class="btn btn-primary" href="{{ route('categorieen-beheren') }}"> <i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($subcat, ['method' => 'PATCH', 'url' => ['updateSubCat/'. $subcat->id]]) !!}
        @include('category.subcatform')
    {!! Form::close() !!}
@endsection