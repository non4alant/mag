@extends('layouts.app')

@section('content')
    <h1>Сравнение товаров</h1>
    <ul class="list-group">
        @foreach($productsInComparison as $comparison)
            <li class="list-group-item">
                {{ $comparison->name }}
                @foreach($comparison->characteristics as $char)
                    @php
                        $charId = $char->id;
                        $charValue = $char->pivot->value;
                        $isDuplicate = false;
                    @endphp
                    @foreach($productsInComparison as $product)
                        @if($product->id != $comparison->id && $product->characteristics->contains(function ($value, $key) use ($charId, $charValue) {
                            return $value->pivot->characteristic_id == $charId && $value->pivot->value == $charValue;
                        }))
                            @php
                                $isDuplicate = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    @unless($isDuplicate)
                        <p class="fs-4">{{$char->name}}: {{$charValue}}</p>
                    @endunless
                @endforeach
                <form action="{{ route('comparison.remove') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $comparison->id }}">
                    <button type="submit" class="btn btn-danger">Удалить из сравнения</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
