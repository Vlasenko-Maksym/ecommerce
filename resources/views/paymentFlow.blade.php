@extends('layouts.app')

@section('content')
<p style="margin-top:50px">Procesando su pago,por favor espere...</p>
<div class="fa-3x">
  <i class="fas fa-spinner fa-pulse"></i>
</div>
<script type="text/javascript" src="{{ asset('js/payment.js') }}"></script>
@endsection
