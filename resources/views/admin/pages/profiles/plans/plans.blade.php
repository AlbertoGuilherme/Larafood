
@extends('adminlte::page')
@section('title', "Planos da perfil {$profile->name}")

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">perfil</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.plans', $profile->id)}}" class="active">Planos</a></li>
    </ol>

<h1>Plano  do perfil {{$profile->name}} </h1>
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
                        @foreach ($plans as $plan)

                        <tr>

                             <td>{{ $plan->name }}</td>

                            <td style="max-width: 10px">
                                {{-- <a href="{{route('details.plan.index', $plan->id)}}"  class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('plans.profiles.detach', [$plan->id, $profile->id])}}"  class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>

                            </td>





                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">

            <div  >
                @if (isset($filter))
                {!! $plans->appends($filter)->links() !!}

                @else
                {!! $plans->links() !!}
                @endif

            </div>

        </div>
</div>

@stop

