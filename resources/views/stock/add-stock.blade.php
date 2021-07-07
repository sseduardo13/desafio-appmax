@extends('stock.layout')
@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2> Adicionar ao Estoque</h2>
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
<hr>
<div>
  <h3>Produto: {{ $product->name }}</h3>
  <h5>Estoque disponível: {{ $product->amount }}</h5>
</div>
<form action="{{url('stock', $product->id)}}" method="POST">
  @csrf
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Quantidade:</strong>
      <input type="number" name="amount" class="form-control" required>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Adicionar</button>
  </div>
</form>
@endsection