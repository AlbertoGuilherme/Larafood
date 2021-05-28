@extends('adminlte::page')
@section('title', "Editar detalhe do plano {$detail->name}")

@section('content_header')


    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes do plano</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.create', $plan->url)}}">Adicionar novo Detalhe</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.edit', [$plan->url, $detail->id])}}">Editar Plano</a></li>
    </ol>

<h1> Adicionar novo Detalhes ao Plano {{$plan->name}}</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{route('details.plan.update', [$plan->url, $detail->id])}}" method="post">
            @method('PUT')
         @include('admin.pages.plans.details._partials.form')
        </form>


    </div>
</div>
@endsection
