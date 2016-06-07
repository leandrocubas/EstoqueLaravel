
@extends('layout.principal')
@section('conteudo')

@if(empty($p))
  <div class="alert alert-danger" style="margin:15px; min-height: 60px;">Produto não encontrado</div>
 @endif
<h1>Atualizar produto</h1>
  <form action="{{action('ProdutoController@atualizar', $p->id)}}" method="post">

  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  
  <div class="form-group">
    <label>Nome</label>
    <input name="nome" class="form-control" value="{{ $p->nome }}"/>
  </div>
  <div class="form-group">
    <label>Descricao</label>
    <input name="descricao" class="form-control" value="{{ $p->descricao }}" />
  </div>
  <div class="form-group">
    <label>Valor</label>
    <input name="valor" class="form-control" value="{{ $p->valor }}"/>
  </div>
  <div class="form-group">
    <label>Quantidade</label>
    <input type="number" name="quantidade" class="form-control" value="{{ $p->quantidade }}"/>
</div>

  <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>

@stop