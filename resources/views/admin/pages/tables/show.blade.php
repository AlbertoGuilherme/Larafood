@extends('adminlte::page')
@section('title', "{$table->identify}")
<link rel="stylesheet" href="css/comum.css">

@section('content_header')
<h1>Detalhes da Categoria <b>{{$table->identify}}</b></h1>
<div class="card">

<div class="card-body">

<table class="table table-stripped">
    <tr>
       <thead>
           <th> <b>Identificação</b>
             {{$table->identify}}</th>



    </tr>
</thead>
</table>
@include('admin.pages.alerts.errors')
    <form action="{{route('tables.destroy',$table->id)}}" method="POST">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>  </button>
    </form>
</div>
</div>

@stop

@section('content')



@stop
