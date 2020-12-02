@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-1">
            <h3>Categorieën</h3>
            <a href="{{ url('catcreate') }}" class="btn btn-primary">Toevoegen</a><br><br>
        </div>
        <div class="col-5">
                
        </div>
        <div class="col-1">
            <h3>Subcategorieën</h3>
            <a href="{{ url('subcatcreate') }}" class="btn btn-primary">Toevoegen</a><br><br>
        </div>
</div>
    <div class="row">
    <div class="col-md-6">        
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naam</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cats as $cat)
                        <tr>
                            <th scope="row">{{ $cat->id }}</th>
                            <td>{{ $cat->name }}</td>
                            <td><a href="{{ url('catedit/'. $cat->id) }}"><i class="fas fa-cog"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="col-md-6">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naam</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcats as $subcat)
                        <tr>
                            <th scope="row">{{ $subcat->id }}</th>
                            <td>{{ $subcat->name }}</td>
                            <td><a href="{{ url('subcatedit/' . $subcat->id) }}"><i class="fas fa-cog"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
