@extends('layouts.app')

@section('title', 'Характеристика')

@section('content')
    <a href="{{route('characteristic.index')}}" class="btn btn-primary btn-lg active"
       role="button"
       style="margin-bottom: 30px; margin-top: 20px"
       aria-pressed="true">Ко всем характеристикам</a>
    <form action="{{route('characteristic.update', $characteristic->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Наименование</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{$characteristic->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Обновить характеристику</button>
    </form>

@endsection

@section('scripts')
@endsection
