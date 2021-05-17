@extends('tamplate.app')
@section('title', 'Financeiro')
@section('content')
<div class="container">


<h1>HOME DO BLADE</h1>
<link rel="stylesheet" href = "css/bootstrap.min.css" }}>
   <div class="btn btn-large btn-secondary mb-4">
    <a href="{{ route('products.create') }}"> Cadastrar  </a>
   </div>


    <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
        @csrf
        <div class="form-group">
        <input type="text" name="filtrar" id="filtrar" placeholder="Filtrar Registros" class="form-control" value="{{$filters['filter'] ?? ''}}">
    </div>
        <button type="submit" class="btn btn-info">Pesquisar</button>
    </form>

   <div class="mx-5 ">
      <table class="table table-striped" >
                  <thead>
                        <tr>
                            <th width="100">Imagem</th>
                           <th>Nome</th>
                           <th>Preco</th>
                           <th width="100">Accoes</th>
                        </tr>
               </thead>
               <tbody>
                  @foreach ($produtos as $prod)
                  <tr>
                      <td>
                          @if ($prod->image)
                                <img src="{{url("storage/{$prod->image}")}}" alt="$prod->image" style = "max-width: 200px;">
                          @else

                          @endif
                      </td>
                  <td>{{$prod->name}}</td>
                  <td>{{$prod->price}}</td>
                  <th><a href="{{route('products.show', $prod->id)}}">Detalhes</a></th>
                  <th><a href="{{route('products.edit', $prod->id)}}">Editar</a></th>
               </tr>
               @endforeach
               </tbody>


   </table>
</div>

<div class="container">

    @if (isset($filters))
         {!! $produtos->appends($filters)->links()   !!}
    @else
         {!! $produtos->links()   !!}
    @endif

</div>
</div>
   @endsection
