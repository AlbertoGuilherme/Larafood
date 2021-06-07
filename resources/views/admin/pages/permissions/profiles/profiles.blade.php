
@extends('adminlte::page')
@section('title', 'Perfis da permissão {$permission->name}')

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">perfil</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

<h1>Perfis da permissão {{$permission->name}} </h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">
                @include('admin.pages.profiles.alerts.errors')

        <div class="card-body">


                    <table class="table table-condensed">
                        <tr>
                            <thead>

                             <th>Name</th>

                            <th width="250px">Accoes</th>



                            </thead>

                        </tr>
                        @foreach ($profiles as $profile)

                        <tr>

                             <td>{{ $profile->name }}</td>

                            <td style="max-width: 10px">
                                {{-- <a href="{{route('details.profile.index', $profile->id)}}"  class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('profiles.permission.detach', [$profile->id, $permission->id])}}"  class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>

                            </td>





                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">

            <div  >
                @if (isset($filter))
                {!! $profiles->appends($filter)->links() !!}

                @else
                {!! $profiles->links() !!}
                @endif

            </div>

        </div>
</div>

@stop

