@extends('layout')
@section('title', 'Estoque')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2> Baixar do Estoque</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('products.index') }}"> Voltar</a>
    </div>
  </div>
</div>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        {{ $error }}
      @endforeach
    </ul>
  </div>
@endif

<hr>
<div>
  <h3>Produto: {{ $product->name }}</h3>
  <h5>Estoque disponível: {{ $product->amount }}</h5>
</div>
<form action="{{url('stock/down', $product->id)}}" method="POST">
  @csrf
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Cliente:</strong>
      <input type="text" name="client" class="form-control" placeholder="Cliente" required>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Quantidade:</strong>
      <input type="number" name="amount" class="form-control" required>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Baixar</button>
  </div>
</form>
@endsection