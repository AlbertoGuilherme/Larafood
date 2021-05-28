@extends('adminlte::page')
@section('title', "{$plan->name}")

@section('content_header')
<h1>Detalhes do plano <b>{{$plan->name}}</b></h1>
<div class="card">

<div class="card-body">

<table class="table table-stripped">
    <tr>
       <thead>
           <th> <b>Nome</b>
             {{$plan->name}}</th>
        <th><b>Url</b>
             {{$plan->url}}</th>
        <th>    <b>Preco </b>
             {{ number_format($plan->price, 2 , ',' ,  '.') }}</th>
        <th>  <b>Description</b> {{$plan->description}}</th>
    </tr>
</thead>
</table>
@include('admin.pages.alerts.errors')
    <form action="{{route('plans.destroy',$plan->url)}}" method="POST">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>  </button>
    </form>
</div>
</div>

@stop

@section('content')



@stop
