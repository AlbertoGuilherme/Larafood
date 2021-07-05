@extends('adminlte::page')
@section('title', 'Editar Mesa')
<link rel="stylesheet" href="css/comum.css">

@section('content_header')
<h1>Editar Usuário {{$table->name}}</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('tables.update', $table->id)}}" method="post">
                    @csrf
                    @method('PUT')
                        @include('admin.pages.tables._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">Atualizar</button>
                        </div>
                    </form>

                </div>
                </div>
@stop

@section('content')



@stop
