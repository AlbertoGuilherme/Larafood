@extends('adminlte::page')
<link rel="stylesheet" href="css/comum.css">
@section('title', 'cadastrar novo plano')


@section('content_header')
<h1>Cadastrar Novo Plano</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('plans.store')}}" method="post">
                    @csrf
                        @include('admin.pages.plans._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">criar</button>
                            </div>
                    </form>

                </div>
          </div>
@stop

@section('content')



@stop
