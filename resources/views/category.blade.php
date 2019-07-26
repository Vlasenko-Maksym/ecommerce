@extends('layouts.app')

@section('content')

@forelse ($products as $producto)
<a href={{$producto->logoUrl}}></a>
@empty
  <p>No hay productos para esta marca.</p>
@endforelse

@endsection
