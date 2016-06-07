@extends('layout.principal')

@section('conteudo')

<h1>Detalhes do produto: {{$p->nome }} </h1>
<ul> <li>
<b>Valor:</b> R$ {{$p->valor }} </li>
<li>
<b>Descrição:</b> {{$p->descricao or 'Não há descrição para este produto'}} </li>
 <li>
<b>Quantidade em estoque:</b> {{ $p->quantidade }} </li>
</ul>

@stop