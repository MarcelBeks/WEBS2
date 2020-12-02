@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Toevoegen</a><br><br>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Naam</th>
                <th scope="col">Categorie</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td><a href="{{ route('products.edit', $product->id) }}"><i class="fas fa-cog"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
