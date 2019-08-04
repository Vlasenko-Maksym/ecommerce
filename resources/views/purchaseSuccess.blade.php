@extends('layouts.app')
<p>hola</p>
@section('content')

  <p>{{$lastCart}}</p>
  @forelse ($purchasedItems as $item)
    <p>{{$item->name}}</p>
  @empty

  @endforelse
@endsection
