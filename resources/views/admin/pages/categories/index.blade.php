@extends('adminlte::page')
@section('title', 'Categorias')
<link rel="stylesheet" href="css/comum.css">

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

<h1>Categorias <a href="{{route('categories.create')}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i></a></h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">

            {{-- FILTRO --}}
                <form action="{{route('categories.search')}}" method="post" class="form form-inline">
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
                             <th>url</th>

                            <th width="270px">Accoes</th>



                            </thead>

                        </tr>
                        @foreach ($categories as $category)

                        <tr>

                             <td>{{ $category->name }}</td>
                             <td>{{ $category->url }}</td>

                            <td style="max-width: 10px">

                                <a href="{{route('categories.show', $category->id)}}"  class="btn btn-warning rounded-circle"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{route('categories.edit', $category->id)}}"  class="btn btn-primary rounded-circle"> <i class="fas fa-edit" aria-hidden="true"></i></a>


                            </td>





                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">



            <div  >
                @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}

                @else
                {!! $categories->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
