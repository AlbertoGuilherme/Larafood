@extends('adminlte::page')
@section('title', 'Planos')
<link rel="stylesheet" href="css/comum.css">

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
                            <th width="270px">Accoes</th>



                            </thead>

                        </tr>
                        @foreach ($plans as $plan)

                        <tr>

                             <td>{{ $plan->name }}</td>
                            <td> {{ number_format($plan->price , 2 , ',', '.' ) }} <b>KZ</b> </td>
                            <td style="max-width: 10px">
                                <a href="{{route('details.plan.index', $plan->url)}}"  class="btn btn-info rounded-circle"> <i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                <a href="{{route('plans.show', $plan->url)}}"  class="btn btn-warning rounded-circle"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{route('plans.edit', $plan->url)}}"  class="btn btn-primary rounded-circle"> <i class="fas fa-edit" aria-hidden="true"></i></a>
                                <a href="{{route('plans.profiles', $plan->id)}}"  class="btn btn-warning"> <i class="fa fa-address-book" aria-hidden="true"></i> </a>

                            </td>





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
