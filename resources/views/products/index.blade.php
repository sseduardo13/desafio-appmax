@extends('products.layout')
@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Desafio Appmax</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary btn-sm" href="{{ route('products.create') }}"> Cadastrar Produto</a>
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
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Visualizar" href="{{ route('products.show',$product->id) }}">
            <i class="fas fa-eye fa-md"></i>
          </a>
          <a class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" href="{{ route('products.edit',$product->id) }}">
            <i class="fas fa-pen fa-md"></i>
          </a>
          <a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Adicionar ao estoque" href="{{url('stock/add-stock', $product->id)}}">
            <i class="fas fa-arrow-circle-up fa-lg"></i>
          </a>
          <a class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Baixar do estoque" href="{{url('stock/down-stock', $product->id)}}">
            <i class="fas fa-arrow-circle-down fa-lg"></i>
          </a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deletar">
            <i class="fas fa-trash-alt fa-md"></i>
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
@endsection