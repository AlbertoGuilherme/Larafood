@extends('adminlte::page')
<link rel="stylesheet" href="css/comum.css">
@section('title', 'cadastrar nova mesa')


@section('content_header')
<h1>Cadastrar Nova Mesa</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('tables.store')}}" method="post">
                    @csrf
                        @include('admin.pages.tables._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">Criar</button>
                            </div>
                    </form>

                </div>
          </div>
@stop

@section('content')



@stop
