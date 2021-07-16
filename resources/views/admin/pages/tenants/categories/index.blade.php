@extends('adminlte::page')
@section('title', 'Categorias disponiveis para  Produto {{$product->name}}')

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('products.index')}}">producto</a></li>
        <li class="breadcrumb-item "> <a href="{{route('products.categories', $product->id)}}" >Produtos</a></li>
        <li class="breadcrumb-item active"> <a href="{{route('products.categories', $product->id)}}" >desponiveis</a></li>
    </ol>

<h1>Categorias disponiveis para  Produto {{$product->title}} <a href="{{route('products.categories.available',$product->id)}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i> ADD </a></h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">
                @include('admin.pages.products.categories.alerts.errors')
            {{-- FILTRO --}}
                <form action="{{route('categories.search')}}" method="post" class="form form-inline">
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
                        @foreach ($categories as $category)

                        <tr>

                             <td>{{ $category->name }}</td>

                            <td style="max-width: 10px">
                                {{-- <a href="{{route('details.category.index', $category->id)}}"  class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('products.categories.detach', [$product->id, $category->id])}}"  class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>

                            </td>





                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">

            <div  >
                @if (isset($filter))
                {!! $categories->appends($filter)->links() !!}

                @else
                {!! $categories->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
