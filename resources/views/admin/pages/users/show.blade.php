@extends('adminlte::page')
@section('title', "{$user->name}")
<link rel="stylesheet" href="css/comum.css">

@section('content_header')
<h1>Detalhes do Usuário <b>{{$user->name}}</b></h1>
<div class="card">

<div class="card-body">

<table class="table table-stripped">
    <tr>
       <thead>
           <th> <b>Nome</b>
             {{$user->name}}</th>
        <th><b>Email</b>
             {{$user->email}}</th>

    </tr>
</thead>
</table>
@include('admin.pages.alerts.errors')
    <form action="{{route('users.destroy',$user->id)}}" method="POST">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>  </button>
    </form>
</div>
</div>

@stop

@section('content')



@stop
