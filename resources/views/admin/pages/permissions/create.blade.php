@extends('adminlte::page')
@section('title', 'cadastrar novo Permissão')

@section('content_header')
<h1>Cadastrar Nova Permissão</h1>

<div class="card">
        <div class="card-body">
                <form action="{{route('permissions.store')}}" method="post">
                    @csrf
                        @include('admin.pages.permissions._partials.form')
                        <div class="form-group">
                            <button type="submit"  class="btn btn-outline-dark">criar</button>
                            </div>
                    </form>

                </div>
          </div>
@stop

@section('content')



@stop
