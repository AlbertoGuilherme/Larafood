
@extends('adminlte::page')
@section('title', 'Editar Permissão')

@section('content_header')
<h1>Editar Permissão {{$permission->name}}</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('permissions.update', $permission->id)}}" method="post">
                    @csrf
                    @method('PUT')
                        @include('admin.pages.permissions._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">Atualizar</button>
                        </div>
                    </form>

                </div>
                </div>
@stop

@section('content')



@stop
