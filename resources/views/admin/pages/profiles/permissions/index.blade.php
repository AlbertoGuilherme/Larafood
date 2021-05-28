@extends('adminlte::page')
@section('title', 'Permissões do perfil {$profile->name}')

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">perfil</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

<h1>Permissões do perfil {{$profile->name}} <a href="{{route('profiles.create')}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i> ADD NOVA PERMISSAO</a></h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">
                @include('admin.pages.profiles.alerts.errors')
            {{-- FILTRO --}}
                <form action="{{route('profiles.search')}}" method="post" class="form form-inline">
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
                                {{-- <a href="{{route('details.profile.index', $profile->id)}}"  class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('profiles.show', $profile->id)}}"  class="btn btn-warning">Ver</a>

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
