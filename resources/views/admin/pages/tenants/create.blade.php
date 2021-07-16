@extends('adminlte::page')
<link rel="stylesheet" href="css/comum.css">
@section('title', 'cadastrar novo Tenant')


@section('content_header')
<h1>Cadastrar Novo Tenants</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('tenants.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        @include('admin.pages.tenants._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">Criar</button>
                            </div>
                    </form>

                </div>
          </div>
@stop

@section('content')



@stop
