@extends('layouts.app')

@section('content')
    <h1>Cart</h1>
    @if(empty($cart))
        <p>Your cart is empty.</p>
    @else
        <table>
            <thead>
            <tr>
                <th>Имя товара</th>
                <th>Цена</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['price'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <button type="submit" class="btn btn-warning"><a href="{{route('cart.search')}}">Поиск товара</a></button>
@endsection
