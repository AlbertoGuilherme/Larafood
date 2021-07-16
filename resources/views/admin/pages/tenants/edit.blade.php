@extends('adminlte::page')
@section('title', 'Editar Tenant')
<link rel="stylesheet" href="css/comum.css">

@section('content_header')
<h1>Editar produto</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('tenants.update', $tenant->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        @include('admin.pages.tenants._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">Atualizar</button>
                        </div>
                    </form>

                </div>
                </div>
@stop

@section('content')



@stop
