@extends('adminlte::page')
@section('title', "Perfis do  plano {$plan->name}" )

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">perfil</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.profiles', $plan->id)}}" class="active">Planos</a></li>
    </ol>
<h1>Perfis disponiveis para o  plano <strong>{{$plan->name}}</strong></h1>
<a href="{{route('plans.profiles.available',$plan->id)}}" class="btn btn-dark">Add Perfil</a>
@stop

@section('content')

<div class="card">
        <div class="card-header">
                @include('admin.pages.alerts.errors')
            {{-- FILTRO --}}
                <form action="{{route('plans.profiles.available', $plan->id)}}" method="post" class="form form-inline">
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
                        <form action="{{route('plans.profiles.attach', [$plan->id])}}" method="post">
                                @csrf
                                @foreach ($profiles as $profile)

                        <tr>
                            <td><input type="checkbox" name="profile[]" id="" value="{{$profile->id}}"></td>
                             <td>{{ $profile->name }}</td>

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
                {!! $profiles->appends($filter)->links() !!}

                @else
                {!! $profiles->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
