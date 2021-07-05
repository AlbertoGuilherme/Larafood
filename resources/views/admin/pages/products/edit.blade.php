@extends('adminlte::page')
@section('title', 'Editar Produto')
<link rel="stylesheet" href="css/comum.css">

@section('content_header')
<h1>Editar produto</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        @include('admin.pages.products._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">Atualizar</button>
                        </div>
                    </form>

                </div>
                </div>
@stop

@section('content')



@stop
