@extends('layouts.app')

@section('title', 'Продукт')

@section('content')
    <a href="{{route('characteristic.index')}}" class="btn btn-primary btn-lg active"
       role="button"
       style="margin-bottom: 30px; margin-top: 20px"
       aria-pressed="true">Ко всем товарам</a>
    <form action="{{route('product.update', $product->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Наименование</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{$product->name}}">
            <label for="exampleInputPassword1" class="form-label">Цена</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="price" value="{{$product->price}}">
            <label for="exampleInputPassword1" class="form-label">Описание</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description"value="{{$product->description}}">
        </div>
        <button type="submit" class="btn btn-primary">Обновить товар</button>
    </form>

@endsection

@section('scripts')
@endsection
