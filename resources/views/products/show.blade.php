@extends('layouts.app')

@section('title', 'Продукт')

@section('content')
    <a href="{{route('characteristic.index')}}" class="btn btn-primary btn-lg active"
       role="button"
       style="margin-bottom: 30px; margin-top: 20px"
       aria-pressed="true">Ко всем товарам</a>
    <p class="fs-2" style="margin-top: 20px">Название: {{$product->name}}</p>
    <p class="fs-4">Цена: {{$product->price}}</p>
    <p class="fs-4">Описание товара: {{$product->description}}</p>
    <h4>Характеристики </h4>
    @foreach($product->characteristics as $char)
    <p class="fs-4">{{$char->name}}: {{$char->pivot->value}}</p>
    @endforeach
    <a href="{{route('product.edit', $product->id)}}"
       class="btn btn-primary btn-lg active"
       role="button"
       style="margin-bottom: 30px"
       aria-pressed="true">Обновить</a>
    <form action="{{route('product.destroy', $product->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>

@endsection

@section('scripts')
@endsection
