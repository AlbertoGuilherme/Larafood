@extends('site.layouts.app')


<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Piteu</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Action 1</a>
                    <a class="dropdown-item" href="#">Action 2</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">

              @if (auth()->user())
                <a name="" id="" class="btn btn-primary" href="#" role="button">{{$userName}}</a>

              @else
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href="{{route('login')}}">Entrar</a></button>


              @endif
             </form>
    </div>
</nav>
@section('content')
<div class="text-center">
    <h1 class="title-plan">Escolha o plano</h1>
</div>
<div class="row">

    @foreach ($plans as $plan)

    <div class="col-md-4 col-sm-6">
        <div class="pricingTable">
            <div class="pricing-content">
                <div class="pricingTable-header">
                    <h3 class="title">{{$plan->name}}</h3>
                </div>
                <div class="inner-content">
                    <div class="price-value">


                        <span class="amount">{{$plan->price}}</span>
                        <span class="currency">kz</span>
                        <span class="duration">Por Mês</span>

                    </div>

                    <ul>
                        @foreach ($plan->details as $detail)


                        <li>{{$detail->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="pricingTable-signup">
                <a href="{{route('site.subscription', $plan->url)}}">Assinar</a>
            </div>
        </div>
    </div><!--end-->

    @endforeach
</div>
@endsection
