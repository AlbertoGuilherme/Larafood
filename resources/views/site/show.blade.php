@extends('tamplate.app')

@section('title', 'Detalhes do produto {{$product->name}}')

@section('content')
<div class="container my-2">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<h1>Produto : {{$product->name}} <a href=" {{route('products.index')}} "><<</a></h1>


   

<ul>
   <li><strong>Nome : </strong>{{$product->name}}</li>
   <li><strong>Descricao : </strong>{{$product->description}}</li>
   <li><strong>Preco : </strong>{{$product->price}}</li>

</ul>

<form action="{{route('products.destroy', $product->id)}} " method = "post"> 
@csrf
@method('DELETE')
<button class="btn btn-danger" type ="submit">Deletar produto {{$product->name}}</button>
</form>
</div>
@endsection