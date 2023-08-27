@extends('layouts.app')

@section('title', 'Продукты')

@section('content')
    <a href="{{route('product.create')}}" class="btn btn-primary btn-lg active"
       role="button"
       style="margin-bottom: 30px; margin-top: 20px"
       aria-pressed="true">Создать продукт</a>
    @foreach ($products as $product)
        <ul class="list-group" style="margin-bottom: 5px">
            <li class="list-group-item"><a
                    href="{{route('product.show', ['product' => $product->id])}}">Товар: {{ $product->name }}</a></li>
        </ul>
        <form action="{{ route('comparison.add') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="btn btn-info" style="margin-bottom: 50px">В сравнение</button>
        </form>
    @endforeach
@endsection

@section('scripts')
@endsection
