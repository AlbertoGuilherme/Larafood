@extends('adminlte::page')
@section('title', 'Planos')

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

<h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i></a></h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">

            {{-- FILTRO --}}
                <form action="{{route('plans.search')}}" method="post" class="form form-inline">
                    @csrf
                    <div class="group">
                        <input type="text" name="filter" id="filter" placeholder="Filtrar" class="form-control" value="{{$filters['filter'] ?? ''}}">
                    </div>

                        <button class="btn btn-dark">Pesquisar</button>
                </form>
        </div>

        <div class="card-body">


                    <table class="table table-condensed">
                        <tr>
                            <thead>

                             <th>Name</th>
                            <th>Price</th>
                            <th width="10px">Accoes</th>



                            </thead>

                        </tr>
                        @foreach ($plans as $plan)

                        <tr>
                            <tbody>
                             <td>{{ $plan->name }}</td>
                            <td> {{ number_format($plan->price , 2 , ',', '.' ) }} <b>KZ</b> </td>
                            <td style="max-width: 10px">
                                <a href="{{route('plans.show', $plan->url)}}"  class="btn btn-warning">Ver</a>

                            </td>
                            <td style="max-width: 10px">
                                <a href="{{route('plans.edit', $plan->url)}}"  class="btn btn-primary">Editar</a>

                            </td>
                            </tbody>
                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">

            <div  >
                @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}

                @else
                {!! $plans->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
