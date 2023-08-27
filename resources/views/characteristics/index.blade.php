@extends('layouts.app')

@section('title', 'Характеристики')

@section('content')
    <a href="{{route('characteristic.create')}}" class="btn btn-primary btn-lg active"
       role="button"
       style="margin-bottom: 30px; margin-top: 20px"
       aria-pressed="true">Создать характеристику</a>
    @foreach ($characteristics as $characteristic)
        <ul class="list-group">
            <li class="list-group-item"><a href="{{route('characteristic.show',
            ['characteristic' => $characteristic->id])}}">Характеристика: {{ $characteristic->name }}</a></li>
        </ul>
    @endforeach
@endsection

@section('scripts')
@endsection
