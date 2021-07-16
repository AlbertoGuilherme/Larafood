@extends('adminlte::page')
@section('title', "Categorias  do  Produto {$product->title}" )

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('products.index')}}">perfil</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.categories', $product->id)}}" class="active">Planos</a></li>
    </ol>
<h1>Categorias  disponiveis para o  Produto <strong>{{$product->name}}</strong></h1>
<a href="{{route('products.categories.attach',$product->id)}}" class="btn btn-dark">Add Perfil</a>
@stop

@section('content')

<div class="card">
        <div class="card-header">
                @include('admin.pages.alerts.errors')
            {{-- FILTRO --}}
                <form action="{{route('products.categories.available', $product->id)}}" method="post" class="form form-inline">
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
                        <form action="{{route('products.categories.attach', [$product->id])}}" method="post">
                                @csrf
                                @foreach ($categories as $category)

                        <tr>
                            <td><input type="checkbox" name="category[]" id="" value="{{$category->id}}"></td>

                             <td>{{ $category->name }}</td>

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
                {!! $categories->appends($filter)->links() !!}

                @else
                {!! $categories->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
