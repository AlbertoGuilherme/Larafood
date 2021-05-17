@extends('tamplate.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<div class="container">


@section('title', "Formulario de edicao do produto {{$product->name}} ")

@section('content')

        <h1>Editar produto {{$product->name}}</h1>
        <div class="alert alert-warning">
            @if($errors->any())
              <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
              </ul>
            @endif
   </div>

        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
           @csrf

           <div class="form-group">
                <input type="text"  class="form-control" name="name" id="name" placeholder = "Nome do Arquivo" value="{{$product->name}}">
        </div>
        <div class="form-group">
                <input type="text"  class="form-control"name="description" id="description" placeholder = "Descricao" value="{{$product->description}}" >
        </div>
        <div class="form-group">
                <input type="text"  class="form-control"name="price" id="price" placeholder = "price" value="{{$product->price}}" >
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="image" id="image">
    </div>
                <button type="submit">Enviar</button>
        </form>
</div>
@endsection
