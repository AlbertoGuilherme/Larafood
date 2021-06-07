@extends('adminlte::page')
@section('title', 'Permissões disponiveis para o  perfil {$profile->name}')

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">perfil</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>
<h1>Permissoes disponiveis para o perfil <strong>{{$profile->name}}</strong></h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">
                @include('admin.pages.profiles.alerts.errors')
            {{-- FILTRO --}}
                <form action="{{route('profiles.permission.available', $profile->id)}}" method="post" class="form form-inline">
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
                                <th width = "50px">#</th>
                             <th>Name</th>





                            </thead>

                        </tr>
                        <form action="{{route('profiles.permission.attach', $profile->id)}}" method="post">
                                @csrf
                                @foreach ($permissions as $permission)

                        <tr>
                            <td><input type="checkbox" name="permission[]" id="" value="{{$permission->id}}"></td>
                             <td>{{ $permission->name }}</td>

                            <td style="max-width: 10px">


                            </td>
                        </tr>

                @endforeach
                <tr>
                    <td colspan="500px">
                        <button type="submit" class="btn btn-lg  btn-success">Vincular</button>
                    </td>
                </tr>

                        </form>
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
