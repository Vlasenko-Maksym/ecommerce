@extends('layouts.app')

@section('content')
  <div class="container">
    <form class="" action="/agregarMarca" method="post" enctype="multipart/form-data" style="margin-top:50px;">
      @csrf
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <input type="text" class="form-control form-header-input {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Ingrese la marca...">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          @error('name')
            {{$message}}
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <input class="{{ $errors->has('logoUrl') ? 'is-invalid' : '' }}" type="file" name="logoUrl" id="logoUrl" >
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          @error('logoUrl')
            {{$message}}
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4 form-footer-input">
          <button type="submit" class="btn btn-primary custom-btn">Guardar marca</button>
        </div>
      </div>
    </form>
  </div>
@endsection
