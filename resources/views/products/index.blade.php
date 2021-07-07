@extends('products.layout')
@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Desafio Appmax</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> Cadastrar Produto</a>
      </div>
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

  <table class="table table-bordered">
    <tr>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Quantidade</th>
      <th width="280px">Ações</th>
    </tr>

    @foreach ($products as $product)
    <tr>
      <td>{{ $product->name }}</td>
      <td>{{ $product->description }}</td>
      <td>{{ $product->amount }}</td>
      <td>
        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
          <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}">Visualizar</a>
          <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}">Editar</a>
          <a href="{{url('stock/add-stock', $product->id)}}" class="btn btn-success btn-sm">Adicionar estoque</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
@endsection