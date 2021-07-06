@extends('products.layout')
@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Desafio Appmax</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('products.create') }}"> Cadastrar Produto</a>
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
      <th width="280px">Ações</th>
    </tr>

    @foreach ($products as $product)
    <tr>
      <td>{{ $product->name }}</td>
      <td>{{ $product->description }}</td>
      <td>
        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
          <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Visualizar</a>
          <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
@endsection