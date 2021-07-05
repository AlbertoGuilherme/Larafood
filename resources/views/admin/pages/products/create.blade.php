@extends('adminlte::page')
<link rel="stylesheet" href="css/comum.css">
@section('title', 'cadastrar novo Produto')


@section('content_header')
<h1>Cadastrar Novo Produtos</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @include('admin.pages.products._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">criar</button>
                            </div>
                    </form>

                </div>
          </div>
@stop

@section('content')



@stop
