@extends('adminlte::page')
@section('title', 'Profile')

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">perfil</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

<h1>perfil <a href="{{route('profiles.create')}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i></a></h1>
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

                            <th width="270">Ações</th>



                            </thead>

                        </tr>
                        @foreach ($profiles as $profile)

                        <tr>

                             <td>{{ $profile->name }}</td>

                            <td style="max-width: 10px">
                                {{-- <a href="{{route('details.profile.index', $profile->id)}}"  class="btn btn-info">Detalhes</a> --}}

                                <a href="{{route('profiles.show', $profile->id)}}"  class="btn btn-warning rounded-circle"> <i class="fa fa-eye"></i> </a>
                                <a href="{{route('profiles.edit', $profile->id)}}"  class="btn btn-primary rounded-circle"> <i class="fa fa-edit"></i> </a>
                                <a href="{{route('profiles.plans', $profile->id)}}"  class=" btn btn-info rounded-circle"><i class="fas fa-list-alt" ></i></a>
                                <a href="{{route('profiles.permission' , $profile->id )}}" class=" btn btn-warning "><i class="fas fa-lock" ></i></a>
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
