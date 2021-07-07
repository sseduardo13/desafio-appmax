@extends('products.layout')
@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Editar Produto</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('products.index') }}"> Voltar</a>
      </div>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
    <strong>Ops!</strong> Há algum problema com seu cadastro.<br><br>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('products.update',$product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Nome:</strong>
          <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nome" required>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>SKU:</strong>
          <input type="text" name="sku" value="{{ $product->sku }}" class="form-control" placeholder="SKU" readonly>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Quantidade:</strong>
          <input type="number" name="amount" value="{{ $product->amount }}" class="form-control" readonly>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Descrição:</strong>
          <textarea class="form-control" style="height:150px" name="description" placeholder="Descrição">{{ $product->description }}</textarea>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </form>
@endsection