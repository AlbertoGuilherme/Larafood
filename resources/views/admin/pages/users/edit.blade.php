@extends('adminlte::page')
@section('title', 'Editar Usuário')
<link rel="stylesheet" href="css/comum.css">

@section('content_header')
<h1>Editar Usuário {{$user->name}}</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('users.update', $user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                        @include('admin.pages.users._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">Atualizar</button>
                        </div>
                    </form>

                </div>
                </div>
@stop

@section('content')



@stop
