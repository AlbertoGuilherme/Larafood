@extends('adminlte::page')
@section('title', 'permission')

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">perfil</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

<h1>perfil <a href="{{route('permissions.create')}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i></a></h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">
                @include('admin.pages.permissions.alerts.errors')
            {{-- FILTRO --}}
                <form action="{{route('permissions.search')}}" method="post" class="form form-inline">
                    @csrf
                    <div class="group">
                        <input type="text" name="filter" id="filter" placeholder="Filtrar" class="form-control" value="{{$filter['filter'] ?? ''}}">
                    </div>

                        <button class="btn btn-dark">Pesquisar</button>
                </form>
        </div>

        <div class="card-body">


                    <table class="table table-condensed">
                        <tr>
                            <thead>

                             <th>Name</th>

                            <th width="250px">Accoes</th>



                            </thead>

                        </tr>
                        @foreach ($permissions as $permission)

                        <tr>

                             <td>{{ $permission->name }}</td>

                            <td style="max-width: 10px">
                                {{-- <a href="{{route('details.permission.index', $permission->id)}}"  class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('permissions.show', $permission->id)}}"  class="btn  btn-warning rounded-circle"> <i class="fa fa-eye"></i> </a>
                                <a href="{{route('permissions.edit', $permission->id)}}"  class="btn  btn-primary rounded-circle"> <i class="fa fa-edit"></i> </a>
                                <a href="{{route('permissions.profiles', $permission->id)}}"  class="btn  btn-info rounded-circle">  <i class="fa fa-book"></i> </a>

                            </td>





                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">

            <div  >
                @if (isset($filter))
                {!! $permissions->appends($filter)->links() !!}

                @else
                {!! $permissions->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
