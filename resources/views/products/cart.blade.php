@extends('layouts.app')

@section('title', 'Корзина')

@section('content')
    <h1>Корзина</h1>
    @if(empty($cart))
        <p>Корзина пуста.</p>
    @else
        <table>
            <tr>
                <th>Название товара</th>
                <th>Цена</th>
            </tr>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item['product']->name }}</td>
                    <td>{{ $item['product']->price }}</td>
                </tr>
            @endforeach
        </table>
    @endif

    <p><a href="{{ route('product.index') }}">Вернуться к покупкам</a></p>
@endsection

@section('scripts')
@endsection
