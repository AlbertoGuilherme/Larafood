@extends('adminlte::page')
@section('title', 'Produtos')
<link rel="stylesheet" href="css/comum.css">

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produtos</a></li>
        <li class="breadcrumb-item active"></li>
    </ol>

<h1>Produtos <a href="{{route('products.create')}}" class="btn btn-dark"><i class=" fas fa-plus-circle"></i></a></h1>
@stop

@section('content')

<div class="card">
        <div class="card-header">

            {{-- FILTRO --}}
                <form action="{{route('products.search')}}" method="post" class="form form-inline">
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
                            <th width ="100"> Imagem </th>
                             <th>Nome do produto</th>
                             <th>Preco</th>

                            <th width="270px">Accoes</th>



                            </thead>

                        </tr>
                        @foreach ($products as $product)

                        <tr>

                             <td><img src="{{url("storage/{$product->image}"  ) }}" alt="{{$product->title}}" width = '100px'></td>
                             <td>{{ $product->title }}</td>
                             <td>{{ $product->price }}</td>

                            <td style="max-width: 10px">

                                <a href="{{route('products.show', $product->id)}}"  class="btn btn-warning rounded-circle"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{route('products.edit', $product->id)}}"  class="btn btn-primary rounded-circle"> <i class="fas fa-edit" aria-hidden="true"></i></a>
                                <a href="{{route('products.categories', $product->id)}}"  class="btn btn-warning" title="categorias"> <i class="fas fa-layer-group"></i></a>

                            </td>





                        </tr>



                @endforeach
            </table>
        </div>
        <div class="card-footer ">

            <div  >
                @if (isset($filters))
                {!! $products->appends($filters)->links() !!}

                @else
                {!! $products->links() !!}
                @endif

            </div>

        </div>
</div>

@stop
