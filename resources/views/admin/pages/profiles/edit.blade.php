
@extends('adminlte::page')
@section('title', 'Editar Perfil')

@section('content_header')
<h1>Editar Perfil {{$profile->name}}</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('profiles.update', $profile->id)}}" method="post">
                    @csrf
                    @method('PUT')
                        @include('admin.pages.profiles._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">Atualizar</button>
                        </div>
                    </form>

                </div>
                </div>
@stop

@section('content')



@stop
