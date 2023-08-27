@extends('layouts.app')

@section('title', 'Характеристика')

@section('content')
    <a href="{{route('characteristic.index')}}" class="btn btn-primary btn-lg active"
       role="button"
       style="margin-bottom: 30px; margin-top: 20px"
       aria-pressed="true">Ко всем характеристикам</a>
    <p class="fs-2" style="margin-top: 20px">Название: {{$characteristic->name}}</p>
    <a href="{{route('characteristic.edit', $characteristic->id)}}"
       class="btn btn-primary btn-lg active"
       role="button"
       style="margin-bottom: 30px"
       aria-pressed="true">Обновить</a>
    <form action="{{route('characteristic.destroy', $characteristic->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>

@endsection

@section('scripts')
@endsection
