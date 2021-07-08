@extends('layout')
@section('title', 'Relatórios')
@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h3>Relatório de {{ $operation }} diária de produtos</h3>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ url('reports') }}"> Voltar</a>
      </div>
    </div>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
    <strong>Ops!</strong> Há algum problema com seu relatório.<br><br>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif
  <table class="table table-bordered">
    <tr>
      <th>SKU</th>
      <th>Nome</th>
      <th>Quantidade movimentada</th>
      <th>Origem</th>
      <th>Quantidade em estoque</th>
      <th>Estoque</th>
    </tr>
    @foreach ($transactions as $transaction)
    <tr>
      <td>{{ $transaction->sku }}</td>
      <td>{{ $transaction->nome }}</td>
      <td>{{ $transaction->quantidade }}</td>
      <td>{{ $transaction->origem }}</td>
      <td>{{ $transaction->estoque_atual }}</td>
      <td>{{ $transaction->nivel }}</td>
      <td>
      </td>
    </tr>
    @endforeach
  </table>

@endsection  