@extends('adminlte::page')
<link rel="stylesheet" href="css/comum.css">
@section('title', 'cadastrar novo usuário')


@section('content_header')
<h1>Cadastrar Nova Categoria</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('categories.store')}}" method="post">
                    @csrf
                        @include('admin.pages.categories._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">criar</button>
                            </div>
                    </form>

                </div>
          </div>
@stop

@section('content')



@stop
