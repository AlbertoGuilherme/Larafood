@extends('adminlte::page')
@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes do plano</a></li>
    </ol>

<h1>Detalhes do Plano {{$plan->name}} <a href="{{route('details.plan.create', $plan->url)}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i>add</a></h1>
@stop

@section('content')

<div class="card">




        <div class="card-body">
                    @include('admin.pages.alerts.errors')

                    <table class="table table-condensed">
                        <tr>
                            <thead>

                             <th>Name</th>

                            <th width="250px">Accoes</th>



                            </thead>

                        </tr>
                        @foreach ($details as $detail)

                        <tr>
                            <tbody>
                             <td>{{ $detail->name }}</td>


                            <td style="max-width: 10px">
                                <a href="{{route('details.plan.show', [$plan->url, $detail->id])}}"  class="btn btn-warning">Ver</a>

                                <a href="{{route('details.plan.edit',[$plan->url, $detail->id])}}"  class="btn btn-primary">Edit</a>
                            </td>

                            </tbody>
                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">

            <div  >
                @if (isset($filters))
                {!! $details->appends($filters)->links() !!}

                @else
                {!! $details->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
