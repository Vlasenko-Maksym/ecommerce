@extends('layouts.app')

@section('content')

@forelse ($products as $element)

@empty
  <p>No hay productos para esta marca.</p>
@endforelse

@endsection
