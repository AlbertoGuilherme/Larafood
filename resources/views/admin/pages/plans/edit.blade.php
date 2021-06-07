@extends('adminlte::page')
@section('title', 'Editar plano')
<link rel="stylesheet" href="css/comum.css">

@section('content_header')
<h1>Editar plano {{$plan->name}}</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('plans.update', $plan->url)}}" method="post">
                    @csrf
                    @method('PUT')
                        @include('admin.pages.plans._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">Atualizar</button>
                        </div>
                    </form>

                </div>
                </div>
@stop

@section('content')



@stop
