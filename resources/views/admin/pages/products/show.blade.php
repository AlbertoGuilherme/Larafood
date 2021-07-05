@extends('adminlte::page')
@section('title', "{$product->name}")
<link rel="stylesheet" href="css/comum.css">

@section('content_header')
<h1>Detalhes do Usuário <b>{{$product->name}}</b></h1>
<div class="card">

<div class="card-body">

<table class="table table-stripped">
    <tr>
       <thead>
        <th> <b>Imagem</b>
            <img src="{{url("storage/{$product->image}")}}" alt="{{$product->title}}" style = "max-width: 100px;">
           <th> <b>Titulo</b>
             {{$product->title}}</th>
        <th><b>descricao</b>
             {{$product->description}}</th>

    </tr>
</thead>
</table>
@include('admin.pages.alerts.errors')
    <form action="{{route('products.destroy',$product->id)}}" method="POST">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>  </button>
    </form>
</div>
</div>

@stop

@section('content')



@stop
