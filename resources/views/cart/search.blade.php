@extends('layouts.app')

@section('content')
    <h1>Поиск товара</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="{{route('cart.add')}}" method="post">
        @csrf
        <label for="product_id">Артикул товара (ID):</label>
        <input type="text" name="product_id" required>
        <button type="submit" class="btn btn-warning">Добавить в корзину</button>
    </form>
@endsection
