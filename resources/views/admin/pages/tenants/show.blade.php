@extends('adminlte::page')
@section('title', "{$tenant->name}")
<link rel="stylesheet" href="css/comum.css">

@section('content_header')
<h1>Detalhes do Usuário <b>{{$tenant->name}}</b></h1>
<div class="card">

<div class="card-body">

<table class="table table-stripped">
    <tr>
       <thead>
        <th> <b>Imagem</b>
            <img src="{{url("storage/{$tenant->logo}")}}" alt="{{$tenant->title}}" style = "max-width: 100px;">
            <th> <b>Plano</b>
                {{$tenant->plan->name}}</th>
                <th> <b>Nome</b>
                    {{$tenant->name}}</th>
           <th> <b>Url</b>
             {{$tenant->url}}</th>

        <th><b>email</b>
             {{$tenant->email}}</th>

             <th> <b>Nif</b>
                {{$tenant->nif}}</th>

           <th><b>Ativo</b>
                {{$tenant->active == 'Y' ? 'Sim' : 'Nao'}}</th>

                    <h3>Dados da subscricao</h3>
                <th><b>Data de Assinatura</b>
                    {{$tenant->tenant_subscription}}</th>

                    <th><b>Data que expira</b>
                        {{$tenant->expires_at}}</th>

                        <th><b>Identificador</b>
                            {{$tenant->subscription_id}}</th>
                            <th><b>Ativo</b>
                                {{$tenant->subscription_active ? 'Sim' : 'Nao'}}</th>
                        <th><b>Cancelou</b>
                         {{$tenant->subscription_suspended ? 'Sim' : 'Nao'}}</th>



    </tr>
</thead>
</table>
@include('admin.pages.alerts.errors')
    <form action="{{route('tenants.destroy',$tenant->id)}}" method="POST">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>  </button>
    </form>
</div>
</div>

@stop

@section('content')



@stop
