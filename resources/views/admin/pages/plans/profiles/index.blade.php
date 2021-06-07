@extends('adminlte::page')
@section('title', 'Perfis disponiveis para  plano {{$plan->name}}')

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">plano</a></li>
        <li class="breadcrumb-item "> <a href="{{route('plans.profiles', $plan->id)}}" >Planos</a></li>
        <li class="breadcrumb-item active"> <a href="{{route('plans.profiles', $plan->id)}}" >desponiveis</a></li>
    </ol>

<h1>Perfis disponiveis para  plano {{$plan->name}} <a href="{{route('plans.profiles.available',$plan->id)}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i> ADD NOVo perfil</a></h1>
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
                        @foreach ($profiles as $profile)

                        <tr>

                             <td>{{ $profile->name }}</td>

                            <td style="max-width: 10px">
                                {{-- <a href="{{route('details.profile.index', $profile->id)}}"  class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('plans.profiles.detach', [$plan->id, $profile->id])}}"  class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>

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
