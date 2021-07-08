@extends('layout')
@section('title', 'Produtos')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Cadastrar produto</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('products.index') }}"> Voltar</a>
    </div>
  </div>
</div>

@if ($errors->any())
  <div class="alert alert-danger">
    <strong>Ops!</strong> Há alguns problemas com seu cadastro.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Nome:</strong>
        <input type="text" name="name" class="form-control" placeholder="Nome" required>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>SKU:</strong>
        <input type="text" name="sku" class="form-control" placeholder="SKU" required>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Quantidade:</strong>
        <input type="number" name="amount" class="form-control" required>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <strong>Descrição:</strong>
        <textarea class="form-control" style="height:150px" name="description" placeholder="Descrição"></textarea>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </div>
</form>

@endsection