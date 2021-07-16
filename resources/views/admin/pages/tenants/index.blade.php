@extends('adminlte::page')
@section('title', 'Empresas')
<link rel="stylesheet" href="css/comum.css">

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('tenants.index')}}">Produtos</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

<h1>Tenants </h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">

            {{-- FILTRO --}}
                <form action="{{route('tenants.search')}}" method="post" class="form form-inline">
                    @csrf
                    <div class="group">
                        <input type="text" name="filter" id="filter" placeholder="Filtrar :" class="form-control" value="{{$filters['filter'] ?? ''}}">
                    </div>

                        <button class="btn btn-dark">Pesquisar</button>
                </form>
        </div>

        <div class="card-body">


                    <table class="table table-striped" >
                        <tr>
                            <thead>
                            <th width ="100"> Logo</th>
                             <th>Nome do produto</th>
                             <th>Preco</th>

                            <th width="270px">Accoes</th>



                            </thead>

                        </tr>
                        @foreach ($tenants as $tenant)

                        <tr>

                             <td><img src="{{url("storage/{$tenant->logo}"  ) }}" alt="{{$tenant->title}}" width = '100px'></td>
                             <td>{{ $tenant->name }}</td>
                             <td>{{ $tenant->active }}</td>

                            <td style="max-width: 10px">

                                <a href="{{route('tenants.show', $tenant->id)}}"  class="btn btn-warning rounded-circle"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{route('tenants.edit', $tenant->id)}}"  class="btn btn-primary rounded-circle"> <i class="fas fa-edit" aria-hidden="true"></i></a>

                            </td>





                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">

            <div  >
                @if (isset($filters))
                {!! $tenants->appends($filters)->links() !!}

                @else
                {!! $tenants->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
