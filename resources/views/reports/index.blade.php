@extends('reports.layout')
@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h3>Relatório de movimentação diária de produtos</h3>
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
  <form action="{{url('reports')}}" method="POST">
  @csrf
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Data inicial:</strong>
      <input type="date" name="date_begin" class="form-control" required>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Data final:</strong>
      <input type="date" name="date_end" class="form-control" required>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Operação:</strong>
      <select class="form-control" name="operation" required>
        <option disabled selected>Selecione uma operação:</option>
        <option value="add">Entrada</option>
        <option value="down">Saída</option>
      </select>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Gerar relatório</button>
  </div>
</form>

@endsection  