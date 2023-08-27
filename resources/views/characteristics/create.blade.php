@extends('layouts.app')

@section('title', 'Характеристика')

@section('content')
    <a href="{{route('characteristic.index')}}" class="btn btn-primary btn-lg active"
       role="button"
       style="margin-bottom: 30px; margin-top: 20px"
       aria-pressed="true">Ко всем характеристикам</a>
    <form action="{{route('characteristic.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Название</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Добавить характеристику</button>
    </form>
@endsection

@section('scripts')
@endsection
