@extends('adminlte::page')
@section('title', "{$profile->name}")

@section('content_header')
<h1>Detalhes do perfil <b>{{$profile->name}}</b></h1>
<div class="card">

<div class="card-body">

<table class="table table-stripped">
    <tr>
<ul>

   <li><b>Nome</b>{{$profile->name}}</li>


    <li><b>Description</b> {{$profile->description}}</li>
</tr>


</ul>

</table>
@include('admin.pages.alerts.errors')
    <form action="{{route('profiles.destroy',$profile->id)}}" method="POST">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>  </button>
    </form>
</div>
</div>

@stop

@section('content')



@stop
