@extends('adminlte::page')
@section('title', 'Usuários')
<link rel="stylesheet" href="css/comum.css">

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuários</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

<h1>Usuários <a href="{{route('users.create')}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i></a></h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">

            {{-- FILTRO --}}
                <form action="{{route('users.search')}}" method="post" class="form form-inline">
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

                             <th>Name</th>
                             <th>email</th>

                            <th width="270px">Accoes</th>



                            </thead>

                        </tr>
                        @foreach ($users as $user)

                        <tr>

                             <td>{{ $user->name }}</td>
                             <td>{{ $user->email }}</td>

                            <td style="max-width: 10px">

                                <a href="{{route('users.show', $user->id)}}"  class="btn btn-warning rounded-circle"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{route('users.edit', $user->id)}}"  class="btn btn-primary rounded-circle"> <i class="fas fa-edit" aria-hidden="true"></i></a>


                            </td>





                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">

            <div  >
                @if (isset($filters))
                {!! $users->appends($filters)->links() !!}

                @else
                {!! $users->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
