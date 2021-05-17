@extends('tamplate.app')
<link rel="stylesheet" href = "css/bootstrap.min.css" >
@section('title', 'Formulario de cadastro')

@section('content')

        <h1>Cadastrar produto</h1>
                @if($errors->any())
                <div class="alert alert-warning">
                  <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                  </ul>
                </div>
                @endif

        <form action="{{ route('products.store')}}" method="post"  enctype = multipart/form-data>

           @csrf
           <div class="form-group">
                <input type="text"  class="form-control" name="name" id="name" placeholder = "Nome do Arquivo">
        </div>
        <div class="form-group">
                <input type="text"  class="form-control"name="description" id="description" placeholder = "Descricao">
        </div>
        <div class="form-group">
                <input type="text"  class="form-control"name="price" id="price" placeholder = "price">
        </div>
        <div class="form-group">
                <input type="file" class="form-control" name="image" id="image">
        </div>
                <button type="submit">Enviar</button>
        </form>


@endsection
