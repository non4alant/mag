@extends('layouts.app')

@section('title', 'Добавление товара в корзину')

@section('content')
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <form action="/add-to-cart" method="post">
        @csrf
        <label for="product_id">Код товара:</label>
        <input type="text" name="product_id" required>
        <br>
        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" value="1" required>
        <br>
        <button type="submit">Добавить</button>
    </form>
@endsection

@section('scripts')
@endsection
