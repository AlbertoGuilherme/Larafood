@extends('adminlte::page')
@section('title', 'Mesas')
<link rel="stylesheet" href="css/comum.css">

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('tables.index')}}">Mesas</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

<h1>Mesas <a href="{{route('tables.create')}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i></a></h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">

            {{-- FILTRO --}}
                <form action="{{route('tables.search')}}" method="post" class="form form-inline">
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

                             <th>Identificação da Mesa</th>


                            <th width="270px">Accoes</th>



                            </thead>

                        </tr>
                        @foreach ($tables as $table)

                        <tr>

                             <td>{{ $table->identify }}</td>


                            <td style="max-width: 10px">

                                <a href="{{route('tables.show', $table->id)}}"  class="btn btn-warning "> <i class="fa fa-eye" aria-hidden="true"></i></a>



                            </td>





                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">



            <div  >
                @if (isset($filters))
                {!! $tables->appends($filters)->links() !!}

                @else
                {!! $tables->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
