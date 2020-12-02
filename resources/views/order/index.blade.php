@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Geplaatst</th>
                <th scope="col">Tijd</th>
                <th scope="col">Prijs</th>
                <th scope="col">Betaald</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th class="align-middle" scope="row">{{ $order->id }}</th>
                    <td class="align-middle">{{ date('d M Y', strtotime($order->created_at)) }}</td>
                    <td class="align-middle">{{ date('H:i', strtotime($order->created_at)) }}</td>
                    <td class="align-middle">&euro;{{ $order->total_price }}</td>
                    <td class="align-middle">@if ($order->paid) Ja @else Nee @endif</th>
                    <td><a href="{{ route('order.view', ['order_id' => $order->id]) }}" class="btn btn-primary">Bekijken</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
