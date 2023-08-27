@extends('layouts.app')

@section('title', 'Продукт')

@section('content')
    <a href="{{route('product.index')}}" class="btn btn-primary btn-lg active"
       role="button"
       style="margin-bottom: 30px; margin-top: 20px"
       aria-pressed="true">Ко всем товарам</a>
    <form action="{{route('product.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Наименование</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name">
            <label for="exampleInputPassword1" class="form-label">Цена</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="price">
            <label for="exampleInputPassword1" class="form-label">Описание</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description">
            <label for="characteristics">Характеристики:</label>
            @foreach ($characteristics as $characteristic)
                <div>
                    <input type="checkbox" name="characteristics[]" value="{{ $characteristic->id }}" id="characteristic_{{ $characteristic->id }}">
                    <label for="characteristic_{{ $characteristic->id }}">{{ $characteristic->name }}</label>
                    <input type="text" name="values[]" placeholder="Value for {{ $characteristic->name }}">
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Добавить товар</button>
    </form>

@endsection

@section('scripts')
@endsection
