@extends('adminlte::page')
@section('title', "{$permission->name}")

@section('content_header')
<h1>Detalhes do perfil <b>{{$permission->name}}</b></h1>
<div class="card">

<div class="card-body">

<table class="table table-stripped">
    <tr>
<ul>

   <li><b>Nome</b>{{$permission->name}}</li>


    <li><b>Description</b> {{$permission->description}}</li>
</tr>


</ul>

</table>
@include('admin.pages.alerts.errors')
    <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>  </button>
    </form>
</div>
</div>

@stop

@section('content')



@stop
